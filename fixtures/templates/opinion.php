<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'dt_add' => $faker->time("Y-m-d H:i:s"),
    'rate' => $faker->randomDigit(),
    'description' => $faker->sentence(),
];