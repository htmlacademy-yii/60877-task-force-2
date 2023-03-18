<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'create_at' => $faker->time("Y-m-d H:i:s"),
    'rate' => $faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'description' => $faker->sentence(),
    'task_id' => $faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'user_id' => $faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'executor_id'=>$faker->randomElement([1,2,3,5,6,7,8,9,10])
];