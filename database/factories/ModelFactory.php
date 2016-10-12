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
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Business::class, function(Faker\Generator $faker) {
	return [
		'name' => $faker->company,
		'description' => $faker->catchPhrase,
		'street_address' => $faker->streetAddress,
		'address_locality' => $faker->city,
		'address_region' => $faker->country,
		'postcode' => $faker->postcode,
		'telephone' => $faker->phoneNumber,
		'rating' => rand(1, 5),
		'reviews' => rand(1, 100),
		'slug' => $faker->slug
	];
});