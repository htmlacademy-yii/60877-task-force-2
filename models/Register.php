<?php
namespace app\models;
use yii\db\ActiveRecord;
use app\models\Cities;
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
            'name' => 'Ваше Имя',
            'email' => 'Email',
            'city' => "Город",
            'password' => 'Пароль', // попадает в атрибуты тега который будет сгенерирован
            'repeat_password' => 'Повтор пароля',
            'answer_orders' => '',
            'dt_add' => "Дата"

        ];
    }
    public static function tableName()
    {
        return 'users';
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
    public function getAllCities() {
        $cities = Cities::find()->all();
        return $cities;
    }
}