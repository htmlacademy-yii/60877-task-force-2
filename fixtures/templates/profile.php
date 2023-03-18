<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'address' => $faker->sentence(),
    'bd' => $faker->time("Y-m-d H:i:s"),
    'about' => $faker->sentence(),
    'phone' => $faker->randomNumber(8, true),
    'skype' => $faker->word(),
    'city_id'=>$faker->randomDigit()
];