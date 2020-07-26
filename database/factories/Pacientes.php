<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Pacientes::class, function (Faker $faker) {
    return [

        'dni' => $faker->buildingNumber,                     
    	'apellido' => $faker->lastName,                                  
        'nombre' => $faker->name,
        'genero' => $faker->sentence(2),
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'edad' => $faker->randomDigit,           
        'obra_social' => $faker->text($maxNbChars = 5),
        'localidad' => $faker->address,                             
        'provincia' => $faker->address,    
        'hcnum' => rand(1,30),                        
        'estado' => $faker->randomElement([0 , 1]),
        // 'remember_token' => Str::random(10),
        //
    ];
});
