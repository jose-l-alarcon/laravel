<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	 // $this->truncateTables(['rol_usuario', 'administrador', 'medico']);
              // cargar las tablas para vaciar , luego utilizarla en el metodo 


         //cargar el seeder 
     
          $this->call(pacientesSeeder::class);  
          // $this->call(administradorSeeder::class);
          // $this->call(medicoSeeder::class);

      

    }

     // metodo para vaciar las tablas 
    // protected function truncateTables (array $tables){
   
    //  DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 


    //  foreach ($tables as $table) {
    //  	DB::table($table)->truncate();
    //  }
  

    //  DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 

    // }
}
