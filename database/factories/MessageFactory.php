<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        //
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'subject' => $faker->realText($maxNbChars = 50, $indexSize = 5),
        'message' => $faker->realText($maxNbChars = 300, $indexSize = 5),
        'status' => 'unread', // unread
    ];
});
