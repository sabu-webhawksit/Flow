<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\User::class, function (Faker\Generator $faker) {
    $country    =['Bangladesh','Japan','USA'];
    $branch     =['WHITBD','WHITJP','WHITUSA'];
    $department =['Core Team','Sales Lead'];
    return [
        'name'          => $faker->name,
        'email'         => $faker->safeEmail,
        'password'      => bcrypt('1234'),
        'designation'   => $faker->jobTitle,
        'department'    => $department[mt_rand(0,1)],
        'branch'        => $branch[mt_rand(0,2)],
        'country'       => $country[mt_rand(0,2)],
        'role_id'       => mt_rand(1,5),
        'remember_token'=> str_random(10),
    ];
});

