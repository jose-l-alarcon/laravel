<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Administrador::class, function (Faker $faker) {
    return [

    	'apellido' => $faker->sentence,
    	'nombre' => $faker->sentence,
        'email' => $faker->unique()->safeEmail,
        'nombreUsuario' => $faker->sentence,
        // 'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'idrol' => $faker->randomElement([2]),
        'estado' => $faker->randomElement([0 , 1])
        // 'remember_token' => Str::random(10),
        //
    ];
});
