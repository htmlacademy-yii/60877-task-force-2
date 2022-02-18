<?php


declare(strict_types=1);

namespace HtmlAcademy\models;


use HtmlAcademy\exceptions\CustomException;
use HtmlAcademy\exceptions\FileFormatException;
use HtmlAcademy\exceptions\SourceFileException;

class CsvToSqlConverter
{
    private $filename;
    private $columns;
    private $fileObject;
    private $result = [];
    private $error = null;

    public function __construct($filename, array $columns, $dbName, $tableName, $sqlFile)
    {
        $this->filename = $filename;
        $this->columns = $columns;
        $this->dbName = $dbName;
        $this->sqlFile = $sqlFile;
        $this->tableName = $tableName;
    }

    public function import()
    {
        $this->fileObject = new \SplFileObject($this->filename);

        $structure = "sql/";


        if (!file_exists($this->sqlFile) && !is_dir($structure)) {
            mkdir($structure);
            $this->sqlFileObj = new \SplFileObject($this->sqlFile, "w");
            $createDb = "CREATE DATABASE " . $this->dbName . ";";
            $this->sqlFileObj->fwrite($createDb);
            $createTable = "CREATE TABLE " . $this->tableName . ";";
            $this->sqlFileObj->fwrite($createTable);
            echo "File was successfully created";
        } else {
            //die("Repeatedly trying to create file");
        }

        if (!$this->validateColumns($this->columns)) {
            throw new FileFormatException("Заданы неверные заголовки столбцов");
        }

        if (!file_exists($this->filename)) {
            throw new SourceFileException("Файл не существует");
        }

        try {
            $this->fileObject = new \SplFileObject($this->filename);
        } catch (RuntimeException $exception) {
            throw new SourceFileException("Не удалось открыть файл на чтение");
        }

        $header_data = $this->getHeaderData();
        echo "<pre>";

        //if ($header_data !== $this->columns) {
        //    throw new FileFormatException("Исходный файл не содержит необходимых столбцов");
        //}

        foreach ($this->getNextLine() as $line) {
            $this->result[] = $line;
        }

        foreach ($this->result as $results) {

            $results = str_replace(";", ",", str_replace(";;;", ',', implode(', ', $results)));
            $headerQuery = implode(",", $header_data);
            $contentQuery = "insert into" . " $this->dbName " . "(" . $headerQuery . ")" . " VALUES " . "(" . $results . " ); ";
            file_put_contents($this->sqlFile, $contentQuery, FILE_APPEND);
        }


    }

    public function getData(): array
    {
        return $this->result;
    }

    private function getHeaderData()
    {

        $this->fileObject->rewind();
        $data = $this->fileObject->fgetcsv();
        return $data;
    }

    private function getNextLine()
    {
        $result = null;

        while (!$this->fileObject->eof()) {
            yield $this->fileObject->fgetcsv(';');
        }

        return $result;
    }

    private function validateColumns(array $columns): bool
    {
        $result = true;

        if (count($columns)) {
            foreach ($columns as $column) {
                if (!is_string($column)) {
                    $result = false;
                }
            }
        } else {
            $result = false;
        }

        return $result;
    }

}
