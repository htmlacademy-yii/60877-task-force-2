<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "replies".
 *
 * @property int $id
 * @property string $dt_add
 * @property string $rate
 * @property string $description
 *
 * @property User $user
 *
 */
class TasksReply extends \yii\db\ActiveRecord
{
    const STATUS_REJECTED = "rejected";
    const STATUS_INPROGRESS = "in_progress";
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'tasks_reply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add', 'price', 'user_id', 'task_id', 'description'], 'required'],
            [['dt_add', 'description'], 'string', 'max' => 255],
            ['user_id', 'unique', 'targetAttribute' => 'user_id'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt_add' => 'Dt Add',
            'description' => 'Description',
        ];
    }

    public function getRepliesDateAdd()
    {
        return $this->hasMany(TasksReply::class, ['task_id' => 'id']);
    }

    public function getWasOnSite()
    {

        $timePeriod = (int) strtotime('now') - strtotime($this->dt_add);
        $days = number_format($timePeriod / 60 / 60 / 242, );
        $days = (round((int)$days));

        return \Yii::t('yii', '{delta, plural, =1{1 day} other{# days}}', ['delta' => $days], Yii::$app->language);

    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
