<?php
// ----------------------------------------------------------------------------------------------------
// // ejemplos para definir rutas

  // definir una ruta : controlador/metodo
 Route::get('/Prueba', 'UserController@index');

 Route::get('/detalle/{idpaciente}', 'UserController@detalle_paciente')
	->name('detalle');

// rutas amigables
Route::get('/Usuarios/{id}', 'UserController@user')->where('id', '[0-9]+');
// en el caso de tener rutas con el mismo nombre con la clausula where indicamos que el parametro sera numerico

// mandar 2 variables por get 
Route::get('/Saludo/{nombre}/{apellido}', function ($nombre, $apellido) {
    return "nombre: {$nombre} y apellido {$apellido}";
});



// -------------------------------------------------------------------------------------------------




// RUTAS DEL SISTEMA DE HISTORIAS CLINICAS  

Route::group(['middleware' => 'auth'], function() {
    Route::get('/Admin', 'Administrador@admin')->name('Admin');    // Rutas para ver detalle del paciente 

    // Rutas para agregar nuevo paciente
    Route::get('/nuevoUsuario', 'Administrador@nuevoUsuario')->name('nuevoUsuario');
    Route::post('/agregarUsuario', 'Administrador@insertarUsuario');

	Route::get('/detalle/{idpaciente}', 'Administrador@detalle_paciente')
	->name('detalle');

	// Rutas para editar datos del paciente 
	Route::get('/editarPaciente/{paciente}','Administrador@editarPaciente')
	->name('editar');

	Route::put('updatePaciente/{paciente}', 'Administrador@updatePaciente');
// otra forma de mandar parametros , utilizado para actualizar 
// Route::put peticion para actualizar datos del paciente 

	// RUTAS PARA DIAGNOSTICO
	Route::get('/nuevodiagnostico/{paciente}', 'Administrador@nuevoDiagnostico')
	->name('nuevodiagnostico');

	Route::post('/createDiagnostico/{paciente}', 'Administrador@createDiagnostico');
  
     Route::get('/diagnosticos', 'Administrador@diagnostico')
	->name('diagnosticos');
     
     Route::get('/detalleDiagnostico/{iddiagnostico}', 'Administrador@detalleDiagnostico')
	->name('detalleDiagnostico');

	 Route::get('/actualizarDiagnostico/{iddiagnostico}','Administrador@actualizarDiagnostico')
	->name('actualizarDiagnostico');

     Route::put('updateDiagnostico/{diagnostico}', 'Administrador@updateDiagnostico');

     Route::get('/modificar/{detalle_diagnostico}','Administrador@modificarDetallesDiagnostico')
	->name('modificar');

     Route::put('updateDetallediagnostico/{detalle_diagnostico}', 'Administrador@updateDetallediagnostico')
     ->name('updateDetallediagnostico');

  Route::delete('eliminarDiagnostico/{detalle_diagnostico}', 'Administrador@eliminarDiagnostico')
     ->name('eliminarDiagnostico');

      Route::get('/modificarMedicacion/{medicacion}','Administrador@modificarMedicacion')
	->name('modificarMedicacion');

	 Route::put('updateMedicacion/{medicacion}', 'Administrador@updateMedicacion')
     ->name('updateMedicacion');

      Route::delete('eliminarMedicacion/{medicacion}', 'Administrador@eliminarMedicacion')
     ->name('eliminarMedicacion');
	
	 // Route::get('/diagnosticos', 'Administrador@diagnostico')->name('diagnosticos');
        
     // GENERARAR PDF
      Route::get('/pdf/{iddiagnostico}', 'Administrador@pdf')->name('pdf'); 

      //AGREGAR NUEVO DIAGNOSTICO Y MEDICACION 
    Route::post('/agregarDetalleDiagnostico/{diagnostico}', 'Administrador@agregarDetalleDiagnostico');

     Route::post('/agregarNuevaMedicacion/{diagnostico}', 'Administrador@agregarNuevaMedicacion');

     Route::get('/altaEvolucion/{diagnostico}','Administrador@altaEvolucion')
     ->name('altaEvolucion');

     Route::put('egreso/{diagnostico}', 'Administrador@egreso');

      Route::get('/pacientesEgreso', 'Administrador@pacientesEgreso')
    ->name('pacientesEgreso');

     Route::get('/create', 'Administrador@create')
    ->name('create');



    // RUTAS IMPLEMENTADAS PARA AJAX , CREAR Y ACTUALIZAR 
     Route::post('/store', 'Administrador@store')->name('store');

     Route::post('/storeMedicacion', 'Administrador@storeMedicacion')->name('storeMedicacion');

      // listar diagnosticos con ajax
      Route::get('/listarDiagnosticos', 'Administrador@listarDiagnosticos')
      ->name('listarDiagnosticos');

    //mostrar detalle en la vnetana modal para luego actualozar
      Route::get('/edit/{iddetalle_diagnostico}','Administrador@edit')
      ->name('edit');

      //actualizar detalle de diagnostico con ajax 
      Route::put('updateDetalle', 'Administrador@updateDetalle')
      ->name('updateDetalle');



     // permite que al cerrar sesion y volvamos para atras no muestre informacion privada
      header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
      header('Cache-Control: no-store, no-cache, must-revalidate');
      header('Cache-Control: post-check=0, pre-check=0',false);
      header('Pragma: no-cache');
   // permite que al cerrar sesion y volvamos para atras no muestre informacion privada


   //RUTAS PARA PACIENTES UTILIZANDO VUE JS , AXIOS
     Route::get('/listar', 'PacientesController@listar')->name('listar');    // Rutas para ver detalle del paciente 

     Route::resource('pacientesvue', 'PacientesController' , ['except' => 'show' , 'create', 'edit']);
     // parametros nombre de la ruta con el nombre del controlador, el tercer parametro indica que de todas las rutas creadas excluya el show , create y edit tambien porque se utiliza ventanas modal para crear o actualizar un nuevo paciente
 });

Route::get('/config-cache', function() {      $exitCode = Artisan::call('config:cache');      return '<h1>Clear Config cleared</h1>';  });


// RUTAS PARA EL LOGIN DE USUARIO
Auth::routes();

