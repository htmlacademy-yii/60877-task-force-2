<?php


namespace app\models;


use yii\db\ActiveRecord;

class EditProfile extends ActiveRecord
{
    public $user_img;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'email'], 'required'], // name и email являются обязательными полями
            [['email'], 'email'], // email должен быть валидным адресом электронной почты
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'], // dt_add должно быть целым числом
            ['phone', 'string', 'length' => 11, 'message' => 'Номер телефона должен содержать ровно 11 символов'],
            ['telegram', 'string', 'max' => 64, 'message' => 'Telegram должен содержать не более 64 символов'],
            [['user_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            ['quote', 'match', 'pattern' => '/^[\p{L}\p{N}\p{P}\p{Zs}]+$/u', 'message' => 'Только буквы, цифры, знаки препинания и пробелы разрешены в поле "Информация о себе"'],
        ];

    }

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'email' => 'Email',
            'date_of_birth' => 'День рождения',
            'phone' => 'Номер телефона',
            'telegram' => 'Telegram',
            'quote' => 'Информация о себе',
        ];
    }
}