<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $categories;
 */
class AddTask extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $categories;
    public $location;
    public $expire_date;
    public $files;

    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about_job', 'describe_task', 'budget', 'expire_date'], 'required'],
            ['about_job', 'string', 'max' => 255],
            ['describe_task', 'string', 'max' => 255],
        ];

    }

    public function attributeLabels()
    {
        return [
            'about_job' => 'Опишите суть работы',
            'describe_task' => 'Подробности задания',
            'categories' => 'Категории',
            'location' => 'Локация',
            'budget' => 'Бюджет',
            'expire_date' => 'Срок исполнения',
            'files' => 'Файлы',
        ];
    }


}
