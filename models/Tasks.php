<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;

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
    public $courier_services;
    public $cargo_moving;
    public $without_author;
    public $one_hour;
    public $twelve_hours;
    public $translations;
    public $dropdown;


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
            [['categories'], 'safe'],
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
            'courier_services' => 'Курьерские услуги',
            'cargo_moving' => 'Грузоперевозки',
            'without_author' => 'Без автора',
            'one_hour' => '1 час',
            'twelve_hours' => '12 часов',
            'translations' => 'Переводы',
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabelsCat()
    {
        return [
            'courier_services' => 'Курьерские услуги',
            'cargo_moving' => 'Грузоперевозки',
            'translations' => 'Переводы',
        ];
    }


    public function attributeLabelsAuthor()
    {
        return [
            'without_author' => 'Без исполнителя',
        ];
    }

    public function attributeLabelsTime()
    {
        return [
            'one_hour' => '1 час',
            'twelve_hours' => '12 часов',
            'dropdown' => ''
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
