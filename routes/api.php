<?php

use Illuminate\Http\Request;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('pacientes',function(){

// return App\Pacientes::all();
	// formatear los datos para traerlo a la tabla

   $model = App\Models\Pacientes::query();

	return DataTables::eloquent($model)
	 ->filter(function ($query) {

                    if (request()->has('estado')) {
                        $query->where('estado', '=' , '0');
                    }
                })
	
	->addColumn('btn', 'admin/action')
	->rawColumns(['btn'])
	->toJson();

});
