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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


// 生产文章的工厂
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    // Get a random user
    $user = \App\User::inRandomOrder()->first();
    $type = \App\Type::inRandomOrder()->first();

    // generate fake data for post
    return [
        'user_id' => $user->id,
        "type_id"=>$type->id,
        'title' => $faker->sentence,
        'body' => $faker->text,
    ];
});