<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $create_at
 * @property string $category_id
 * @property string $description
 * @property string $expire
 * @property string $name
 * @property string $address
 * @property string $budget
 * @property string $latitude
 * @property string $longitude
 *
 * @property Category $category
 * @property Replies[] $replies
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['create_at', 'category_id', 'description', 'expire', 'name', 'address', 'budget', 'latitude', 'longitude'], 'required'],
            [['create_at', 'category_id', 'description', 'expire', 'name', 'address', 'budget', 'latitude', 'longitude'], 'string', 'max' => 255],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Dt Add',
            'category_id' => 'Category ID',
            'description' => 'Description',
            'expire' => 'Expire',
            'name' => 'Name',
            'address' => 'Address',
            'budget' => 'Budget',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'without_author' => 'Без автора',
        ];
    }

    public function getWasOnSite()
    {

        //$timePeriod = strtotime('now') - strtotime($this->create_at);
        return \Yii::$app->formatter->asRelativeTime($this->create_at);
        //$days = $timePeriod / 60 / 60 / 24;
        //$result = intval(\Yii::t('yii', '{delta, plural, =1{1 day} other{# days}}', ['delta' => $days], Yii::$app->language));
        //return $result;
    }

//    $task->category;

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getWebsiteCategories()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getReplies()
    {
        return $this->hasMany(TasksReply::class, ['task_id' => 'id']);
    }


}
