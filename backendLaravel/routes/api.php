<?php

use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function(){
    return 'Hola, desde el backend';
});


//primer controller
Route::get('/backend', [BackendController::class, 'getAll']);

//post create
Route::post('/backend', [BackendController::class, 'create']);
//Route::get('/backend', [BackendController::class, 'get']);
Route::put('/backend/{id}', [BackendController::class, 'update']);//parametros opcionales en url
Route::delete('/backend/{id}', [BackendController::class, 'delete']);//parametros opcionales en url