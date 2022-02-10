<?php


//namespace HtmlAcademy\models;
require_once "vendor/autoload.php";
require_once "src/"
use Htmlacademy\Models\CsvToSqlConverter;


//$firstClass = new Task(2, 2);

$csvConverterFirst = new CsvToSqlConverter('data/categories.xlsx');
$csvConverterSecond = new CsvToSqlConverter('data/cities.xlsx');
