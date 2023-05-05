<?php

namespace app\models;

use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;
    private $_user;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['password', 'validatePassword'],
            ['email', 'email'],
            ['email', 'exist', 'targetClass' => User::class, 'targetAttribute' => 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'E-mail',
            'password' => 'Пароль',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {

            $user = $this->getUser();
            if (!$user || !\Yii::$app->security->validatePassword( $this->password, $user->password_hash)) {
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
