<?php

use Illuminate\Support\Facades\Route;
use App\Models\Berita;
use App\Http\Controllers\BeritaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes frontend
Route::get('/', function () {
    return view('frontend.index');
});
Route::get(
    '/blog',
    [BeritaController::class, 'index']
    // $model = new Berita();
    // $data = [
    // //     'berita' => $model,
    // // ];
    // return view('frontend.pages.blog', $data);
);
Route::get('/category', function () {
    return view('frontend.pages.category');
});


// routes backend
Route::get('/admin', function () {
    return view('backend.index');
});
