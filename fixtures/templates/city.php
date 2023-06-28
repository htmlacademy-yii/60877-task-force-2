<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
$city = $faker->city;
$latitude = $faker->latitude;
$longitude = $faker->longitude;

return [
    'name' => $city,
    'latitude' => $latitude,
    'longitude' => $longitude,
];