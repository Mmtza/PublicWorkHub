<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/get/all', [ApiController::class, 'getAllUser']);
Route::get('/user/get/{id}', [ApiController::class, 'getUserById']);
Route::post('/user/create', [ApiController::class, 'createUser']);
Route::post('/user/update/{id}', [ApiController::class, 'updateUserById']);
Route::post('/user/delete/{id}', [ApiController::class, 'deleteUserById']);