<?php
/**
 * @var $index integer
 */

$filePath = __DIR__ . '/../../data/cities.csv';
$stream = fopen($filePath, 'r');

$cities = [];

while (($data = fgetcsv($stream, null, ',',"\n")) !== false) {
    $cities[] = $data;
}

return [
    'name' => $cities[$index+1][0],
    'latitude' => $cities[$index+1][1],
    'longitude' => $cities[$index+1][2],
];
