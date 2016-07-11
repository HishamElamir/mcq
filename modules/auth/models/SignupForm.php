<?php
namespace app\modules\auth\models;
use app\modules\auth\models\User; 
use app\modules\auth\models\AuthAssignment; 
use yii\base\Model;
use app\helper\Mailler;
use app\helper\Constants;

use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{   
  
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $displayname;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'User name'),
            'email' => Yii::t('app', 'Email address'),
            'password' => Yii::t('app', 'Password'),
            'password_repeat' => Yii::t('app', 'Repeat Password'),
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app','This username has already been taken.')],
            ['username', 'string', 'min' => 4, 'max' => 20],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app','This email address has already been taken.')],
            [['password','password_repeat'], 'required'],
            [['password','password_repeat'], 'string', 'min' => 6],
            [['password'], 'in', 'range'=>['password','Password','Password123','123456','12345678','letmein','monkey'] ,'not'=>true, 'message'=>Yii::t('app', 'You cannot use any really obvious passwords')],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message' => Yii::t("app", "The passwords must match")],
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->displayname = $this->username;
             $user ->role = Constants::ROLE_TEACHER;
            $user->status = Constants::IS_ACTIVE_USER;
            $user->login = 1;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            $this->auth_user($user,'teacher');
        return $user;
        }
        return null;
    }

    private function auth_user($user,$item)
    {
        $AuthAssignment = new AuthAssignment();
        $AuthAssignment->item_name = $item;
        $AuthAssignment->user_id = $user->id;
        return $AuthAssignment->save();
    }
}
            