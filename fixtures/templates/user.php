<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
$password = "Maxym";
return [
    'dt_add' => $faker->time("Y-m-d H:i:s"),
    'email' => $faker->email(),
    'name' => $faker->name,
    'password_hash' => Yii::$app->security->generatePasswordHash($password),
    'user_img' => $faker->word(),
    'quote'=>$faker->sentence(),
    'country'=>$faker->word(),
    'city_id'=>$faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'age'=>$faker->randomNumber(5, true),
    'phone'=>$faker->randomNumber(5, true),
    'telegram'=>$faker->word(),
    'status'=>1,
    'user_status'=>$faker->randomElement(['executor', 'customer']),
    'answer_orders'=>1,
    'category_id'=>$faker->randomElement([1,2,3,5,6,7,8,9,10]),
    'date_of_birth'=>$faker->date()
];