<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class FIlterTasks extends Model
{
    public $courier_services;
    public $cargo_moving;
    public $without_author;
    public $one_hour;
    public twelve_hours;
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'courier_services' => 'Курьерские услуги',
            'cargo_moving' => 'Грузоперевозки',
            'without_author' => 'Без исполнителя',
            'one_hour' => '1 час',
            'twelve_hours' => '12 часов',
        ];
    }

}
