<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;
$autoIncrement = autoIncrement();
$factory->define(Profile::class, function (Faker $faker)use ($autoIncrement) {
    $autoIncrement->next();
    return [
        'user_id' => $autoIncrement->current(),
        'hr_id' => '1020'. $autoIncrement->current(),
        'avatar' => 'usersimage/123',
        'site_id' => 1,
        'department_id' => 1,
        'position_id' => 1,
        'ip_phone' =>'313'.$faker->randomDigit,
        'mobile' => $faker->randomDigit,

    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}

