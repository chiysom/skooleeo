<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Company;
use App\Model\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company_id' => function(){
            return Company::all()->random();
        },
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->PhoneNumber,
    ];
});
