<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_replies".
 *
 * @property int $id
 * @property int $rate
 * @property int $description
 * @property int $task_id
 * @property int $user_id
 * @property int $executor_id
 * @property int $create_at
 * @property User $userWriter
 */
class UserReply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_reply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rate', 'description', 'task_id', 'user_id', 'executor_id'], 'required'],
            [['rate', 'task_id', 'user_id', 'executor_id'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'create_at' => Yii::t('app', 'Create Add'),
            'rate' => Yii::t('app', 'Rate'),
            'description' => Yii::t('app', 'Description'),
            'task_id' => Yii::t('app', 'Task ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserRepliesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRepliesQuery(get_called_class());
    }

    public function getLastTask()
    {
        return $this->hasOne(Task::class, ['user_id' => 'executor_id'])->orderBy('create_at DESC')->one();
    }

    public function getUserWriter()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getReplies()
    {
        return $this->hasMany(User::class, ['id' => 'user_id']);
    }

    public function getWasOnSite()
    {
        $create_at_unix = strtotime($this->create_at);
        $timePeriod = strtotime('now') - $create_at_unix;

        $days = floor($timePeriod / 60 / 60 / 24);
        return \Yii::t('yii', '{delta, plural, =1{1 day} other{# days}}', ['delta' => $days], Yii::$app->language);
    }

}
