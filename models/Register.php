<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\City;
use yii\base\Model;

class Register extends Model
{
    public $password;
    public $name;
    public $email;
    public $city;
    public $answer_orders;
    public $repeat_password;

    public function attributeLabels()
    {
        return [
            'answer_orders' => '',
            'repeat_password' => 'Повтор пароля',
            'password' => 'Пароль',
            'email' => 'Email',
            'name' => 'Ваше Имя'
        ];
    }

    public function rules()
    {
        return [
            [
                ['name', 'email', 'city', 'password', 'repeat_password'], 'required'], // password_hash берется с БД
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => Users::class, 'targetAttribute' => 'email'],
            ['password', 'string'],
            ['repeat_password', 'string'],
            ['answer_orders', 'safe'],
            ['password', 'compare', 'compareAttribute' => 'repeat_password'],
        ];
    }
}