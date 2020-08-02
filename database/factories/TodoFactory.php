<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {

	$name = $faker->name;

    return [
        'name' => $name,
        'slug' => Str::limit(Str::slug($name)),
        'message' => $faker->paragraph,
        'details' => $faker->text,
        'image' => $faker->image,
    ];
});
