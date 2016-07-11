<?php

namespace app\modules\auth\models;
 
use Yii;
use yii\base\Model;
use app\modules\auth\models\User; 

/**
 * Login form
 */
class ForgetForm extends Model
{
    public $email;
 
    private $_user = null;

 
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [ 
            [['email',], 'required'],
            // email  required
            [['email'], 'email'],
           
            // email is validated by validatePassword()
            ['email', 'validateEmail'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           'email' => Yii::t('app', 'email'),
         
         
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user) {
                $this->addError($attribute, 'Incorrect email');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function M_user()
    {
        if ($this->validate()) {
            return $this->getUser();
        } else {
            return false;
        }
    }
  
    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }

   

  
}
