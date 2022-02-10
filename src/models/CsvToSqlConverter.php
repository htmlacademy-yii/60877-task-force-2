<?php

declare(strict_types=1);

namespace HtmlAcademy\models;

use htmlacademy\exceptions\CustomException;

class CsvToSqlConverter
{
    private $dirСsv;
    private $dirSql = "data/sql_files/";
    private $fileName;
    private $tableName;
    private $filePath;
    private $fp;

    public function __construct(string $csvName)
    {
        $this->csvName = $csvName;
    }

    public function csvFileCreation()
    {
        $csvFile = new SplFileObject($this->csvName);
        $headerData = $csvFile->fgetcsv();
    }

}
