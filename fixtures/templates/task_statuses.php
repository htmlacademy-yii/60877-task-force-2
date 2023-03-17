<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'task_id' => $faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'user_id' => $faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'status' => $faker->word(),
];