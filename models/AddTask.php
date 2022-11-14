<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "users".
 *
 * @property int $categories;
 */
class AddTask extends Model
{
    /**
     * {@inheritdoc}
     */
    public $categories;
    public $location;
    public $expire_date;
    public $files;
    public $budget;
    public $about_job;
    public $describe_task;
    public $name;

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
            [['about_job', 'describe_task'], 'required'],
            ['about_job', 'string', 'min' => 10],
            ['describe_task', 'string', 'min' => 30],
            [['files'], 'file', 'skipOnEmpty' => false, 'maxSize' => 1024 * 1024, 'maxFiles' => 4],
            ['categories', 'exist', 'targetClass' => Category::class, 'targetAttribute' => 'name'],
            ['budget', 'integer'],
            [['expire_date'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
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
