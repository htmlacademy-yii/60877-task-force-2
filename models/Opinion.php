<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "opinions".
 *
 * @property int $id
 * @property string $dt_add
 * @property string $rate
 * @property string $description
 */
class Opinion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opinion';
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
}
