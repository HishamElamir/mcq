<?php

namespace app\Modules\teacher\models;

use Yii;

class Student extends \app\modules\auth\models\User implements \app\modules\teacher\models\Design_pattern_Observer\IObserver {

    public $studentRole = 30;
    public $notification;
    public $displayname;

    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\modules\teacher\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Name',
           
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function addStudent() {

        if ($this->validate()) {
            $this->email = "not found";
            $this->role = $this->studentRole;
            $this->status = \app\helper\Constants::IS_ACTIVE_USER;
            $this->password_hash = "123456";
            $this->login = 1;
            $this->generateAuthKey();

            //print_r($this->displayname);
            //exit();
            if ($this->save()) {
               $student = $this->findByUsername($this->username);
                $this->auth_user($student,'student');
                return $this;
            } else {
                return false;
            }
        }

        return FALSE;
    }

    private function auth_user($user, $item) {
        $AuthAssignment = new \app\modules\admin\models\AuthAssignment();
        $AuthAssignment->item_name = $item;
        $AuthAssignment->user_id = $user->id;
        return $AuthAssignment->save();
    }

    public function updateObserver() {
        //$this->notification->user_id = $this->id;
        if ($this->notification->save())
            return TRUE;
        else
            return FALSE;
    }

}
