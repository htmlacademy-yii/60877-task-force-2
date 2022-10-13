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
 * @property Users $user
 *
 */
class TasksReplies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $name;

    public static function tableName()
    {
        return 'tasks_replies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add', 'rate', 'description'], 'required'],
            [['dt_add', 'rate', 'description'], 'string', 'max' => 255],
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
            'rate' => 'Rate',
            'description' => 'Description',
        ];
    }

    public function getRepliesDateAdd()
    {
        return $this->hasMany(Replies::class, ['task_id' => 'id']);
    }

        public function getWasOnSite()
    {
        $timePeriod = strtotime('now') - $this->dt_add;
        $days = number_format($timePeriod / 60 / 60 / 24);
        return \Yii::t('yii', '{delta, plural, =1{1 day} other{# days}}', ['delta' => $days], Yii::$app->language);

    }

    public function getUser()
    {
        return $this->hasOne(Users::class, ['id'=>'user_id']);
    }
}
