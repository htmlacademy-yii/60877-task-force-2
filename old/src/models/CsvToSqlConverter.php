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

        if (!file_exists($this->sqlFile) && !is_dir($structure)) {
            mkdir($structure);

            $this->sqlFileObj = new \SplFileObject($this->sqlFile, "w");
            $createDb = "CREATE DATABASE " . $this->dbName . ";";
            $this->sqlFileObj->fwrite($createDb);

            $useQuery = "use " . $this->dbName . ";";
            $this->sqlFileObj->fwrite($useQuery);

            $createTable = " CREATE TABLE " . $this->tableName . "(" . implode(',', $this->columns) . "  varchar(255) NOT NULL".")" . "ENGINE=InnoDB DEFAULT CHARSET=utf8" . "; ";
            $this->sqlFileObj->fwrite($createTable);
            foreach ($this->getNextLine() as $line) {
                $this->result[] = $line;
            }
            foreach ($this->result as $results) {


                $headerQuery = implode(",", $header_data);


                $results2 = "'" . implode("','", $results) . "'";

                $contentQuery = "insert into" . " $this->dbName " . "(" . $headerQuery . ")" . " VALUES " . "(" . $results2 . ")" . ";";


                file_put_contents($this->sqlFile, $contentQuery, FILE_APPEND);
            }
            echo "Files was successfully created";
        } else {
            rmdir($structure);
            $this->sqlFileObj = new \SplFileObject($this->sqlFile, "w");
            $createDb = "CREATE DATABASE " . $this->dbName . ";";
            $this->sqlFileObj->fwrite($createDb);

            $useQuery = "use " . $this->dbName . ";";
            $this->sqlFileObj->fwrite($useQuery);

            $createTable =
                "CREATE TABLE " . $this->tableName . "(" . implode(',', $this->columns) . "varchar(255) NOT NULL".")" .
                "ENGINE=InnoDB DEFAULT CHARSET=utf8" . "; ";



            $this->sqlFileObj->fwrite($createTable);
            foreach ($this->getNextLine() as $line) {
                $this->result[] = $line;
            }
            foreach ($this->result as $results) {


                $headerQuery = implode(",", $header_data);

                $results2 = "'" . implode("','", $results) . "'";

                $contentQuery = "insert into" . " $this->dbName " . "(" . $headerQuery . ")" . " VALUES " . "(" . $results2 . ")" . ";";
                file_put_contents($this->sqlFile, $contentQuery, FILE_APPEND);
            }
            echo "Files was successfully created with directory deleting";
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
            yield $this->fileObject->fgetcsv();
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
