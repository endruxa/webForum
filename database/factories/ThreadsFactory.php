<?php

use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'subject' => $faker->title(),
        'thread' => $faker->slug(),
        'type' => 'nullable'
    ];
});
