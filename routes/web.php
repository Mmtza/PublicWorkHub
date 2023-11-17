<?php

// use App\Http\Controllers\BeritaController;

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('users.index');
})->name('landing')->middleware('guest');

Route::get('/pengaduan-masyarakat', function () {
    return view('users.pengaduan');
})->name('pengaduan');

// Route::get(
//     '/blog',
//     [BeritaController::class, 'index']
//     // $model = new Berita();
//     // $data = [
//     // //     'berita' => $model,
//     // // ];
//     // return view('frontend.pages.blog', $data);
// );
Route::get('/category', function () {
    return view('users.pages.category');
});


// routes admin
Route::get('/admin', function () { //admin dashboard
    return view('admins.index');
})->name('admin');

Route::get('/admin/berita', [BeritaController::class, 'showAllBeritaDashboard'])->name('admin.berita');

Route::get('/admin/berita/tambah', [BeritaController::class, 'viewAddBeritaDashboard'])->name('admin.berita.tambah');

Route::post('/admin/berita/tambah', [BeritaController::class, 'addBeritaDashboard'])->name('admin.berita.tambah.post');

Route::get('/admin/berita/edit', [BeritaController::class, 'viewEditBeritaDashboard'])->name('admin.berita.edit');

Route::patch('/admin/berita/edit', [BeritaController::class, 'editBeritaDashboard'])->name('admin.berita.edit.patch');

Route::get('/admin/users', [UsersController::class, 'showAllUsersDashboard'])->name('admin.users');

Route::get('/admin/pengaduan', [PengaduanController::class, 'showAllPengaduanDashboard'])->name('admin.pengaduan');

// --- example
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
