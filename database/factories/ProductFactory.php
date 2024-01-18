<?php

/** @var Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(1000, 10000),
        'category_id' => function () {
            return Category::query()->inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return User::query()->inRandomOrder()->first()->id;
        }
    ];
});
