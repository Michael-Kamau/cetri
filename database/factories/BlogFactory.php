<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->sentence(),
        'user_id'=>factory(App\User::class),
        'content'=>$faker->paragraph(rand(2,10),true)
    ];
});
