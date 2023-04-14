<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $task_id
 * @property int $status
 * @property int user_id
 */
class TaskStatuses extends ActiveRecord
{
    public static function tableName()
    {
        return 'task_statuses';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task Id',
            'status' => 'Status',
            'user_id' => 'User Id',

        ];
    }
}