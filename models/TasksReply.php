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
    /**
     * {@inheritdoc}
     */
    public $name;

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
