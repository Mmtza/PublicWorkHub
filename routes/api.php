<?php

use App\Http\Controllers\ApiAuth;
use App\Http\Controllers\ApiUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBerita;
use App\Http\Controllers\ApiLoker;
use App\Http\Controllers\ApiPengaduan;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [ApiAuth::class, 'Login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/get/all', [ApiUser::class, 'getAllUser']);
        Route::get('/get/{id}', [ApiUser::class, 'getUserById']);
        Route::post('/create', [ApiUser::class, 'createUser']);
        Route::post('/update/{id}', [ApiUser::class, 'updateUserById']);
        Route::delete('/delete/{id}', [ApiUser::class, 'deleteUserById']);
    });
    
    Route::prefix('pengaduan')->group(function () {
        Route::get('/', [ApiPengaduan::class, 'index']);
        Route::get('/{id}', [ApiPengaduan::class, 'show']);
        Route::post('/createPengaduan', [ApiPengaduan::class, 'store']);
        Route::post('/update/{id}', [ApiPengaduan::class, 'update']);
        Route::delete('/delete/{id}', [ApiPengaduan::class, 'destroy']);
    });
    
    Route::prefix('berita')->group(function () {
        Route::get('/', [ApiBerita::class, 'index']);
        Route::get('/{id}', [ApiBerita::class, 'show']);
        Route::post('/create', [ApiBerita::class, 'store']);
        Route::post('/update/{id}', [ApiBerita::class, 'update']);
        Route::delete('/delete/{id}', [ApiBerita::class, 'destroy']);
    });
    
    Route::prefix('loker')->group(function () {
        Route::get('/', [ApiLoker::class, 'index']);
        Route::get('/{id}', [ApiLoker::class, 'show']);
        Route::post('/create', [ApiLoker::class, 'store']);
        Route::post('/update/{id}', [ApiLoker::class, 'update']);
        Route::delete('/delete/{id}', [ApiLoker::class, 'destroy']);
    });
});
