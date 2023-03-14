<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'dt_add' => $faker->time("Y-m-d H:i:s"),
    'description' => $faker->sentence(),
    'photo' => $faker->word(),
    'task_id' => $faker->randomDigit(),
    'price'=>$faker->randomNumber(5, false),
    'user_id'=>$faker->randomDigit(),
    'status'=>$faker->randomElement(['rejected', 'in_progress'])
];