<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QueriesController;
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




//eloquent

Route::get('/query', [QueriesController::class, 'get']);
Route::get('/query/{id}', [QueriesController::class, 'getById']);
Route::get('/query/method/names', [QueriesController::class, 'getNames']);
Route::get('/query/method/search/{name}/{price}', [QueriesController::class, 'searchNames']);
Route::get('/query/method/searchString/{value}', [QueriesController::class, 'searchString']);
Route::post('/query/method/advanceSearch', [QueriesController::class, 'advanceSearch']);
Route::get('/query/method/join', [QueriesController::class, 'join']);
Route::get('/query/method/groupBy', [QueriesController::class, 'groupBy']);



//CRUDS


Route::apiResource('/product',ProductController::class);