<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'create_at' => $faker->time("Y-m-d H:i:s"),
    'rate' => $faker->randomDigit(),
    'description' => $faker->sentence(),
    'task_id' => $faker->randomDigit(),
    'user_id' => $faker->randomDigit(),
    'executor_id'=>$faker->randomDigit()
];