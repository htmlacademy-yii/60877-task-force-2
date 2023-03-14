<?php


namespace app\models;


use yii\base\Model;

class AddReply extends Model

{
    public $your_comment;
    public $price;
    public $userStatus;
    public $taskStatus;

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
            ['price', 'integer'],
            ['userStatus', 'compare', 'compareValue' => 'executor', 'operator' => '===', 'type' => 'string'],
            ['taskStatus', 'compare', 'compareValue' => 'new', 'operator' => '===', 'type' => 'string'],
        ];

    }
}