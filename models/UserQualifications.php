<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_qualifications".
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 */
class UserQualifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_qualifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id'], 'required'],
            [['user_id', 'category_id'], 'integer'],
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
            'category_id' => 'Category ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQualificationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQualificationsQuery(get_called_class());
    }
}
