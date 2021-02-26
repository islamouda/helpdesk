<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

$factory->define(Ticket::class, function (Faker $faker) {

    return [
        'priority_id' => 1 ,
        'user_id' => 51 ,
        'title' => $faker->title ,
        'subject' => $faker->bankAccountNumber ,
        'recipient_id' => 0 ,
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),

    ];
});
