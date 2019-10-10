<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        'product_id'=>function(){
        return \App\Model\Product::all()->random();
        },
        'customer'=>$faker->word,
        'review'=>$faker->paragraph,
        'star'=>$faker->numberBetween($min =0, $max = 5), // 8567,

    ];
});
