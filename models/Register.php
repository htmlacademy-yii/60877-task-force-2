<?php


namespace app\models;


use yii\db\ActiveRecord;

class Register extends ActiveRecord
{

    public $retype_pass;

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше Имя',
            'email' => 'Email',
            'city' => "Город",
            'password' => 'Пароль',
            'retype_pass' => 'Повтор пароля',
            'answer_orders' => 'Test',
            'dt_add'=>"Дата"
        ];
    }

    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'city', 'password', 'retype_pass', 'answer_orders'], 'safe'],
            [['name', 'email', 'city', 'password', 'retype_pass'], 'required'],
            // атрибут email указывает, что в переменной email должен быть корректный адрес электронной почты
            ['email', 'email'],
            ['email', 'unique'],
        ];
    }
}