<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags_attributes".
 *
 * @property int $id
 * @property string|null $attributes
 */
class TagsAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['attributes'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'attributes' => Yii::t('app', 'Attributes'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TagsAttributesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagsAttributesQuery(get_called_class());
    }


}
