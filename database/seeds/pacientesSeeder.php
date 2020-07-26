<?php

use Illuminate\Database\Seeder;

class pacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Models\Pacientes::class , 20)->create();
    }
}
