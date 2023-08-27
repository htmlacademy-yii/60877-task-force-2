<?php


namespace app\models;


use yii\db\ActiveRecord;
use DateTime;
class EditProfile extends ActiveRecord
{
    public $categories;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'email'], 'required'], // name и email являются обязательными полями
            [['email'], 'email'], // email должен быть валидным адресом электронной почты
            ['date_of_birth', 'date', 'format' => 'php:d.m.Y', 'message' => 'Значение поля «День рождения» должно быть валидной датой в формате дд.мм.гггг'],
            ['date_of_birth', 'validateBirthDate'],
            ['phone', 'string', 'length' => 11, 'message' => 'Номер телефона должен содержать ровно 11 символов'],
            ['telegram', 'string', 'max' => 64, 'message' => 'Telegram должен содержать не более 64 символов'],
            [['user_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            ['categories', 'each', 'rule' => ['integer']],
            ['quote', 'match', 'pattern' => '/^[\p{L}\p{N}\p{P}\p{Zs}]+$/u', 'message' => 'Только буквы, цифры, знаки препинания и пробелы разрешены в поле "Информация о себе"'],
        ];

    }

    public function validateBirthDate($attribute, $params)
    {
        $date = DateTime::createFromFormat('d.m.Y', $this->$attribute);

        if ($date && $date > new DateTime()) {
            $this->addError($attribute, 'Дата рождения не может быть больше текущей даты');
        }
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