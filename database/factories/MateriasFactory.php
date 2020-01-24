<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Materias::class, function (Faker $faker) {
    return [
        //

        'descripcion' => $faker->sentence,
        'estado' => $faker->randomElement([0 , 1])

    ];
});
