<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags_attribution".
 *
 * @property int|null $user_id
 * @property int|null $attributes_id
 * @property int $id
 */
class TagsAttribution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags_attribution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['user_id', 'attributes_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'attributes_id' => Yii::t('app', 'Attributes ID'),
            'id' => Yii::t('app', 'ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TagsAttributionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagsAttributionQuery(get_called_class());
    }
}
