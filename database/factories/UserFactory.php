<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    $gender = [
        1 => 'male',
        2 => 'female'
    ];
    $civil_status = [
        1 => 'soltero',
        2 => 'casado',
        3 => 'separado',
        4 => 'viudo',
        5 => 'uninon libre',
        6 => 'otro'
    ];
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
        'age' => random_int(15, 75),
        'gender' => $gender[random_int(1, 2)],
        'address' => $faker->address,
        'civil_status' => $civil_status[random_int(1, 6)],
        'survey_made' => 0,
        'survey_token' => str_random(40),
        'remember_token' => str_random(40)
    ];
});
