<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'dt_add' => $faker->time("Y-m-d H:i:s"),
    'description' => $faker->sentence(),
    'photo' => $faker->word(),
    'task_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
    'price'=>$faker->randomNumber(5, false),
    'user_id'=>$faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'status'=>$faker->randomElement(['new', 'in_progress'])
];