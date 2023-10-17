<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
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

Route::prefix('posts')->group(function(){
    Route::get('/', [PostController::class, 'list']);
    Route::get('/{id}', [PostController::class, 'listById']);
    Route::get('/{id}', [PostController::class, 'create']);
    Route::get('/{id}', [PostController::class, 'edit']);
    Route::get('/{id}', [PostController::class, 'delete']);
});