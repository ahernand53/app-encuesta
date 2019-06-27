<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
const document_type = [
    1 => 'CC',
    2 => 'TI'
];

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'document_type' => document_type[random_int(1, 2)],
        'profile_picture' => 'url',
        'document_number' => $faker->uuid,
        'account_verified' => 1,
        'isSuper' => 1,
        'password' => bcrypt('secret'), // secret
        'remember_token' => str_random(10),
    ];
});
