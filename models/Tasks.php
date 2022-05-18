<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $dt_add
 * @property string $category_id
 * @property string $description
 * @property string $expire
 * @property string $name
 * @property string $address
 * @property string $budget
 * @property string $latitude
 * @property string $longitude
 *
 * @property Categories $websiteCategories
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add', 'category_id', 'description', 'expire', 'name', 'address', 'budget', 'latitude', 'longitude'], 'required'],
            [['dt_add', 'category_id', 'description', 'expire', 'name', 'address', 'budget', 'latitude', 'longitude'], 'string', 'max' => 255],
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
            'category_id' => 'Category ID',
            'description' => 'Description',
            'expire' => 'Expire',
            'name' => 'Name',
            'address' => 'Address',
            'budget' => 'Budget',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }

    public function getWasOnSite()
    {
        $timePeriod = strtotime('now') - strtotime($this->dt_add);
        return \Yii::$app->formatter->asDuration($timePeriod);
    }

    public function getWebsiteCategories()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

}
