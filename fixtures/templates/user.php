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
    'city_id'=>$faker->randomDigit(),
    'age'=>$faker->randomNumber(5, true),
    'phone'=>$faker->randomNumber(5, true),
    'telegram'=>$faker->word(),
    'status'=>$faker->boolean(),
    'user_status'=>$faker->word(),
    'answer_orders'=>$faker->boolean(),
    'category_id'=>$faker->randomDigit(),
    'date_of_birth'=>$faker->date()
];