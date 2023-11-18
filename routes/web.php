<?php

// use App\Http\Controllers\BeritaController;

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LokerController;
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

Route::get('/admin/berita/edit/{id}', [BeritaController::class, 'viewEditBeritaDashboard'])->name('admin.berita.edit');

Route::patch('/admin/berita/edit/{id}', [BeritaController::class, 'editBeritaDashboard'])->name('admin.berita.edit.patch');

Route::delete('/admin/berita/delete', [BeritaController::class, 'deleteBeritaDashboard'])->name('admin.berita.delete');

Route::get('/admin/users', [UsersController::class, 'showAllUsersDashboard'])->name('admin.users');

Route::get('/admin/users/edit', [UsersController::class, 'viewEditUsers'])->name('admin.users.edit');

Route::patch('/admin/users/edit', [UsersController::class, 'editUsers'])->name('admin.users.edit.patch');

Route::get('/admin/users/tambah', [UsersController::class, 'viewAddUsers'])->name('admin.users.tambah');

Route::post('/admin/users/tambah', [UsersController::class, 'addUsers'])->name('admin.users.tambah.post');

Route::get('/admin/pengaduan', [PengaduanController::class, 'showAllPengaduanDashboard'])->name('admin.pengaduan');

Route::get('/admin/pengaduan/edit', [PengaduanController::class, 'viewEditPengaduan'])->name('admin.pengaduan.edit');

Route::patch('/admin/pengaduan/edit', [PengaduanController::class, 'editPengaduan'])->name('admin.pengaduan.edit.patch');

Route::get('/admin/pengaduan/tambah', [PengaduanController::class, 'viewAddPengaduan'])->name('admin.pengaduan.tambah');

Route::post('/admin/pengaduan/tambah', [PengaduanController::class, 'addPengaduan'])->name('admin.pengaduan.tambah.post');

Route::get('/admin/loker', [LokerController::class, 'showAllLokerDashboard'])->name('admin.loker');

Route::get('/admin/loker/tambah', [LokerController::class, 'viewAddLokerDashboard'])->name('admin.loker.tambah');

Route::post('/admin/loker/tambah', [LokerController::class, 'addLokerDashboard'])->name('admin.loker.tambah.post');

Route::get('/admin/loker/edit', [LokerController::class, 'viewEditLokerDashboard'])->name('admin.loker.edit');

Route::patch('/admin/loker/edit', [LokerController::class, 'editLokerDashboard'])->name('admin.loker.edit.patch');

Route::delete('/admin/loker/delete', [LokerController::class, 'deleteLokerDashboard'])->name('admin.loker.delete');

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
