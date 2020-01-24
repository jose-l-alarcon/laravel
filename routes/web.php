<?php
// ----------------------------------------------------------------------------------------------------
// // ejemplos para definir rutas

  // definir una ruta : controlador/metodo
 Route::get('/Prueba', 'UserController@index');
// rutas amigables
Route::get('/Usuarios/{id}', 'UserController@user')->where('id', '[0-9]+');
// en el caso de tener rutas con el mismo nombre con la clausula where indicamos que el parametro sera numerico

// mandar 2 variables por get 
Route::get('/Saludo/{nombre}/{apellido}', function ($nombre, $apellido) {
    return "nombre: {$nombre} y apellido {$apellido}";
});



// -------------------------------------------------------------------------------------------------

 // Route::get('/Admin', 'UserController@admin');


// rutas del sistema de Historias clinicas 

Route::get('/Admin', 'Administrador@admin')
->name('admin');
// name('admin'); agregar un nombre a la ruta

// Rutas para agregar nuevo paciente
Route::get('/nuevoUsuario', 'Administrador@nuevoUsuario')
->name('nuevoUsuario');

Route::post('/agregarUsuario', 'Administrador@insertarUsuario');

// Rutas para ver detalle del paciente 
Route::get('/detalle/{idpaciente}', 'Administrador@detalle_paciente')
->name('detalle');

// Rutas para editar datos del paciente 
Route::get('/editarPaciente/{paciente}','Administrador@editarPaciente')
->name('editar');

Route::put('updatePaciente/{paciente}', 'Administrador@updatePaciente');
// otra forma de mandar parametros , utilizado para actualizar 
// Route::put peticion para actualizar datos del paciente 









