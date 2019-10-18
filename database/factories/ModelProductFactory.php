<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'detail'=>$faker->paragraph,
        'price'=>$faker->numberBetween($min = 100, $max = 10000), // 8567,
        'store'=>$faker->randomDigit,
        'discount'=>$faker->numberBetween($min = 2, $max = 30),
        'user_id'=>function(){
                    return App\User::all()->random();
        },
    ];
});
