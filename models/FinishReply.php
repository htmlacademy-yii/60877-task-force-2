<?php


namespace app\models;


use yii\base\Model;

class FinishReply extends Model
{
    public $your_comment_finish_task;

    public function attributeLabels()
    {
        return [
            'your_comment_finish_task' => 'Ваш комментарий',
        ];
    }

    public function rules()
    {
        return [
            ['your_comment_finish_task', 'string'],
        ];

    }
}