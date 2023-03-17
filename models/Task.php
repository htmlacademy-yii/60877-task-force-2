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
 * @property string $status
 * @property integer $user_id
 * @property Category $category
 * @property Replies[] $replies
 */
class Task extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    const STATUS_NEW = "new";
    const STATUS_INWORK = "in_progress";
    const STATUS_DONE = "done";
    const STATUS_FAILED = "failed";
    const STATUS_CANCELLED = "canceled";
    const STATUS_REJECTED = "rejected";

    public $your_comment;
    public $price;

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
            [['create_at', 'category_id', 'description', 'expire', 'name', 'address', 'budget'], 'required'],
            [['create_at', 'description', 'expire', 'name', 'address', 'latitude', 'longitude'], 'string', 'max' => 255],
            ['your_comment', 'string'],
            ['price', 'integer']
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
            'your_comment' => 'Ваш комментарий',
            'price' => 'Стоимость',
            'your_comment_finish_task' => 'Ваш комментарий'
        ];
    }

    public function getWasOnSite()
    {
        return \Yii::$app->formatter->asRelativeTime($this->create_at);
    }


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
