<?php


//namespace HtmlAcademy\models;
require_once "vendor/autoload.php";

use HtmlAcademy\models\CsvToSqlConverter;
use HtmlAcademy\models\Task;

header('Content-Type: text/html; charset=utf-8');
$firstClass = new Task(2, 2);

//$csvConverterFirst = new CsvToSqlConverter('data/categories.csv', ['name', 'icon'], 'categories','categories','sql/categories.sql');
//$csvConverterFirst->import();
$csvConverterSecond = new CsvToSqlConverter('data/cities.csv', ['city','latitude','longitude'], 'cities','cities','sql/cities.sql');
$csvConverterSecond->import();
