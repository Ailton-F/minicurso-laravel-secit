<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (Request $request) {
    return response()->json([
        "msg"=>"Sucesso"
    ],200);
});

Route::prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'list']);
    Route::post('/', [UserController::class, 'create']);
    Route::get('/{id}', [UserController::class, 'listById']);
    Route::patch('/{id}', [UserController::class, 'edit']);
    Route::delete('/{id}', [UserController::class, 'delete']);
});

Route::prefix('posts')->group(function(){
    Route::get('/', [PostController::class, 'list']);
    Route::post('/', [PostController::class, 'create']);
    Route::get('/{id}', [PostController::class, 'listById']);
    Route::patch('/{id}', [PostController::class, 'edit']);
    Route::delete('/{id}', [PostController::class, 'delete']);
    Route::post('/add-tag/{id}', [PostController::class, 'addTags']);
});

Route::prefix('tags')->group(function(){
    Route::get('/', [TagController::class, 'list']);
    Route::post('/', [TagController::class, 'create']);
    Route::get('/{id}', [TagController::class, 'listById']);
    Route::patch('/{id}', [TagController::class, 'edit']);
    Route::delete('/{id}', [TagController::class, 'delete']);
});