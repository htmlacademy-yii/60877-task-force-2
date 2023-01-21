<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "replies_link".
 *
 * @property int $id
 * @property int $user_id
 * @property int $replies_id
 * @property int $task_id
 */
class RepliesLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'replies_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'replies_id', 'task_id'], 'required'],
            [['user_id', 'replies_id', 'task_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'replies_id' => 'Replies ID',
            'task_id' => 'Task ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RepliesLinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RepliesLinkQuery(get_called_class());
    }
}
