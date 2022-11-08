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
$factory->define(App\Models\Events::class, function (Faker\Generator $faker) {
    static $password;

    return [
        //'title' => $faker->title,
        //'description' => $faker->lastname,
        //'email' => $faker->unique()->safeEmail,
        //'password' => $password ?: $password = bcrypt('secret'),
        //'remember_token' => str_random(100),

        'title' => $faker->catchPhrase,
    	'date' => $faker->date,
    	'description' => $faker->text,
    	'host' => $faker->firstNameMale,
    	'user_id' => 1,
    	'formatted_address' => $faker->secondaryAddress ,
    	'locality' => $faker->state,
    	'state' => $faker->address,
    	'country' => $faker->country,
    	'lng' => $faker->longitude($min = -180, $max = 180),
    	'lat' => $faker->latitude($min = -90, $max = 90),
    	'administrative_area' => $faker->state,
    ];
});
