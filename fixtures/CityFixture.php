<?php
namespace app\fixtures;

use yii\test\ActiveFixture;

class CityFixture extends ActiveFixture
{
    public $modelClass = 'app\models\City'; // замените это на ваш класс модели City

    // Переопределение метода для чтения данных из CSV-файла
    public function getData()
    {
        $filePath = \Yii::getAlias('@app/data/cities.csv');
        $file = fopen($filePath, 'r');


        $cities = [];

        // Пропустить строку заголовка
        $data = fgetcsv($file);

        while (($data = fgetcsv($file)) !== false) {
            $cities[] = [
                'name' => $data[0],
                'latitude' => $data[1],
                'longitude' => $data[2],
            ];
        }

        fclose($file);

        return $cities;
    }
}
