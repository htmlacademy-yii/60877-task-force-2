<?php


namespace app\models;


use yii\db\ActiveRecord;

class EditProfile extends ActiveRecord
{
    public $informationaboutperson;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [];

    }

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'email' => 'Email',
            'date_of_birth' => 'День рождения',
            'phone' => 'Номер телефона',
            'telegram' => 'Telegram',
            'informationaboutperson' => 'Информация о себе',
        ];
    }
}