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
 * @property Users $userWriter
 */
class UserReplies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_replies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'rate', 'description', 'task_id', 'user_id', 'executor_id'], 'required'],
            [['create_at', 'rate', 'description', 'task_id', 'user_id', 'executor_id'], 'integer'],
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
        return $this->hasOne(Tasks::class, ['user_id' => 'executor_id'])->orderBy('create_at DESC')->one();
    }

    public function getUserWriter()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }

    public function getReplies()
    {
        return $this->hasMany(Users::class, ['id' => 'user_id']);
    }

    public function getWasOnSite()
    {
        $timePeriod = strtotime('now') - $this->create_at;
        $days = number_format($timePeriod / 60 / 60 / 24);
        return \Yii::t('yii', '{delta, plural, =1{1 day} other{# days}}', ['delta' => $days], Yii::$app->language);
    }

}
