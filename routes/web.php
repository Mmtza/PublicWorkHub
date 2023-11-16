<?php

// use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/admin/berita', function () { //berita
    return view('admins.pages.berita');
})->name('admin.berita');

Route::get('/admin/berita/tambah', function () { //berita
    return view('admins.pages.tambah_berita');
})->name('admin.berita.tambah');

Route::post('/admin/berita/tambah', function () { //berita
    return view('admins.pages.tambah_berita');
})->name('admin.berita.tambah.post');

Route::get('/admin/berita/edit', function () { //berita
    return view('admins.pages.edit_berita');
})->name('admin.berita.edit');

Route::patch('/admin/berita/edit', function () { //berita
    return view('admins.pages.edit_berita');
})->name('admin.berita.edit.patch');

Route::get('/admin/users', function () { //user
    return view('admins.form_user.user');
})->name('admin.users');

Route::get('/admin/pengaduan', function () { //pengaduan
    return view('admins.form_pengaduan.pengaduan');
})->name('admin.pengaduan');

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
