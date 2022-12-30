<?php


namespace app\models;


use yii\base\Model;

class AddReply extends Model
{
    public $your_comment;
    public $price;

    public function attributeLabels()
    {
        return [
            'your_comment' => 'Ваш комментарий',
            'price' => 'Стоимость',
        ];
    }

    public function rules()
    {
        return [
            ['your_comment', 'string'],
            ['price', 'integer']
        ];

    }
}