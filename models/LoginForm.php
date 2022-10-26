<?php

namespace app\models;

use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password_hash_view;
    public $password_hash;
    private $_user;

    public function rules()
    {
        return [
            [['email', 'password_hash_view'], 'required'],
            ['password_hash_view', 'validatePassword'],
            ['email', 'email'],
            ['email', 'exist', 'targetAttribute' => 'email'],
            ['password_hash_view', 'compare', 'compareAttribute' => 'password_hash']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !\Yii::$app->security->validatePassword($this->password_hash_view, $user->password_hash)) {
                $this->addError($attribute, 'Неправильный email или пароль');
            }
        }
    }

    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(['email' => $this->email]);
        }

        return $this->_user;
    }
}
