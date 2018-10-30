<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'product_type' => $faker->name,
        'product_description' => str_random(100),
    ];
});
