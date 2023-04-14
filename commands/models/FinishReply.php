<?php


namespace app\models;


use yii\base\Model;

class FinishReply extends Model
{
    public $your_comment_finish_task;
    public $finish_task_rate;

    public function attributeLabels()
    {
        return [
            'your_comment_finish_task' => 'Ваш комментарий',
            'finish_task_rate' => "Ваша оценка"
        ];
    }

    public function rules()
    {
        return [
            ['finish_task_rate', 'required'],
            ['your_comment_finish_task', 'string'],
            ['finish_task_rate', 'number'],
        ];

    }
}