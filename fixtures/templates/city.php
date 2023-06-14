<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
$city = $faker->city();
return [
    'name' => $city,
    'latitude' => $city->latitude(),
    'longitude' => $city->longitude(),
];