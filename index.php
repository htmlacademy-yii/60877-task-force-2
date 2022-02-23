<?php


//namespace HtmlAcademy\models;
require_once "vendor/autoload.php";

use HtmlAcademy\models\CsvToSqlConverter;
use HtmlAcademy\models\Task;

header('Content-Type: text/html; charset=utf-8');
$firstClass = new Task(2, 2);

$csvConverterFirst = new CsvToSqlConverter('data/categories.csv', ['name', 'icon'], 'categories','categories','sql/categories.sql');
$csvConverterFirst->import();
$csvConverterSecond = new CsvToSqlConverter('data/cities.csv', ['city','latitude','longitude'], 'cities','cities','sql/cities.sql');
$csvConverterSecond->import();
$csvConverterThird = new CsvToSqlConverter('data/tasks.csv', ['dt_add','category_id', 'description', 'expire', 'name', 'address', 'budget', 'latitude', 'longitude'], 'tasks','tasks','sql/tasks.sql');
$csvConverterThird->import();
$csvConverterFourth = new CsvToSqlConverter('data/users.csv', ['email','name', 'password', 'dt_add'], 'users','users','sql/users.sql');
$csvConverterFourth->import();
$csvConverterFifth = new CsvToSqlConverter('data/opinions.csv', ['dt_add','rate', 'description'], 'opinions','opinions','sql/opinions.sql');
$csvConverterFifth->import();
$csvConverterSixth = new CsvToSqlConverter('data/profiles.csv', ['address','bd', 'about', 'phone', 'skype','city_id'], 'profiles','profiles','sql/profiles.sql');
$csvConverterSixth->import();
$csvConverterSeventh = new CsvToSqlConverter('data/replies.csv', ['address','bd', 'about', 'phone', 'skype','city_id'], 'replies','replies','sql/replies.sql');
$csvConverterSeventh->import();
