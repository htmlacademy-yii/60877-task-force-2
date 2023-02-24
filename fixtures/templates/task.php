<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'create_at' => $faker->time("Y-m-d H:i:s"),
    'category_id' => $faker->randomDigit(),
    'description' => $faker->sentence(),
    'expire' => $faker->date(),
    'name' => $faker->word(),
    'address' => $faker->sentence(),
    'budget'=>$faker->randomNumber(5, true),
    'latitude'=>$faker->randomFloat(8),
    'longitude'=>$faker->randomFloat(8),
    'status'=>'new',
    'user_id'=>$faker->randomDigit(),
    'executor_id'=>$faker->randomDigit(),
    'without_author'=>1
];