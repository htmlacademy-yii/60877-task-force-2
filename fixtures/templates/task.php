<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
$status = 'new';
$without_author = 1;
$sentence = ['surname', 'name'];
return [
    'create_at' => $faker->time("Y-m-d H:i:s"),
    'category_id' => $faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'description' => $faker->sentence(),
    'expire' => $faker->date(),
    'name' => $faker->word(),
    'address' => $faker->sentence(),
    'budget'=>$faker->randomNumber(5, true),
    'latitude'=>$faker->randomFloat(8),
    'longitude'=>$faker->randomFloat(8),
    'status'=>$status,
    'user_id'=>$faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'executor_id'=>$faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'without_author'=>$without_author
];