<?php


namespace app\models;


use yii\db\ActiveRecord;

class EditProfile extends ActiveRecord
{

  /*  public $informationaboutperson;
    public $date_of_birth;
    public $name;
    public $email;
    public $dt_add;
    public $phone;
    public $telegram;
*/
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
            // добавьте другие правила валидации, которые нужны в вашем случае
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