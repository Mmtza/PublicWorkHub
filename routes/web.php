<?php

// use App\Http\Controllers\BeritaController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserLokerController;
use App\Http\Controllers\PenulisBeritaController;
use App\Http\Controllers\PenyediaLokerController;

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
// Routes Users
Route::get('/', [BeritaController::class, 'showAllBerita'])->name('landing');

Route::get('/berita/{slug?}', [BeritaController::class, 'showBeritaBySlug'])->name('guest.berita');
Route::get('/berita/kategori/{kategori?}', [BeritaController::class, 'showBeritaByKategori'])->name('guest.berita.kategori');
Route::get('/loker/kategori/{kategori?}', [UserLokerController::class, 'showLokerByKategori'])->name('guest.loker.kategori');

Route::get('/our-team', [TeamController::class, 'showAllCrew'])->name('guest.team');
Route::get('/loker', [UserLokerController::class, 'showAllLoker'])->name('guest.loker');
Route::get('/loker/{slug?}', [UserLokerController::class, 'showLokerBySlug'])->name('guest.loker.slug');
Route::post('/loker/daftar/{slug?}', [UserLokerController::class, 'applyLoker'])->name('guest.loker.apply');
Route::delete('/loker/cancel/{slug?}', [UserLokerController::class, 'cancelApplyLoker'])->name('guest.loker.cancel');
Route::get('/pengaduan-masyarakat', [PengaduanController::class, 'showPengaduanUser'])->name('users.pengaduan');

Route::middleware(['auth'])->group(function () {
    Route::post('/pengaduan-masyarakat/tambah', [PengaduanController::class, 'addPengaduan'])->name('users.pengaduan.post');
    Route::get('/pengaduan-masyarakat/download/{file?}', [PengaduanController::class, 'downloadFiles'])->name('users.pengaduan.download');
    Route::post('/berita/like/{id}', [BeritaController::class, 'toggleLike'])->name('all.berita.like.toggle');

    Route::post('/berita/save-comment/{id}', [BeritaController::class, 'saveKomentar'])->name('users.comment');
});


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

Route::post('/notification/read/all', [NotificationController::class, 'markAsReadAllNotification'])->middleware('auth')->name('readAllNotif');
Route::post('/notification/read/{id}', [NotificationController::class, 'markAsReadNotification'])->middleware('auth')->name('readNotif');

// routes admin
Route::middleware(['auth', 'Admin'])->group(function () {

    Route::get('/admin', [DashboardController::class, 'readDataDashboardAdmin'])->name('admin');

    Route::get('/admin/berita', [BeritaController::class, 'showAllBeritaDashboard'])->name('admin.berita');

    Route::get('/admin/berita/tambah', [BeritaController::class, 'viewAddBeritaDashboard'])->name('admin.berita.tambah');

    Route::post('/admin/berita/tambah', [BeritaController::class, 'addBeritaDashboard'])->name('admin.berita.tambah.post');

    Route::get('/admin/berita/edit/{slug?}', [BeritaController::class, 'viewEditBeritaDashboard'])->name('admin.berita.edit');

    Route::get('/admin/berita/preview/{slug?}', [BeritaController::class, 'previewBeritaDashboard'])->name('admin.berita.preview');

    Route::patch('/admin/berita/edit/{slug?}', [BeritaController::class, 'editBeritaDashboard'])->name('admin.berita.edit.patch');

    Route::delete('/admin/berita/delete/{slug?}', [BeritaController::class, 'deleteBeritaDashboard'])->name('admin.berita.delete');

    Route::post('/admin/berita/export-excel', [BeritaController::class, 'excelBeritaDashboard'])->name('admin.berita.excel');

    Route::get('/admin/users', [UsersController::class, 'showAllUsersDashboard'])->name('admin.users');

    Route::get('/admin/users/edit/{id}', [UsersController::class, 'viewEditUsers'])->name('admin.users.edit');

    Route::patch('/admin/users/edit/{id}', [UsersController::class, 'editUsers'])->name('admin.users.edit.patch');

    Route::delete('/admin/users/delete/{id}', [UsersController::class, 'deleteUsers'])->name('admin.users.delete');

    Route::get('/admin/users/tambah', [UsersController::class, 'viewAddUsers'])->name('admin.users.tambah');

    Route::post('/admin/users/tambah', [UsersController::class, 'addUsers'])->name('admin.users.tambah.post');

    Route::get('/admin/pengaduan', [PengaduanController::class, 'showAllPengaduanDashboard'])->name('admin.pengaduan');

    Route::get('/admin/pengaduan/edit/{id}', [PengaduanController::class, 'viewEditPengaduanDashboard'])->name('admin.pengaduan.edit');

    Route::get('/admin/pengaduan/tambah', [PengaduanController::class, 'viewAddPengaduan'])->name('admin.pengaduan.tambah');

    Route::post('/admin/pengaduan/tambah', [PengaduanController::class, 'addPengaduanDashboard'])->name('admin.pengaduan.tambah.post');

    Route::patch('/admin/pengaduan/edit/{id}', [PengaduanController::class, 'editPengaduanDashboard'])->name('admin.pengaduan.edit.patch');

    Route::delete('/admin/pengaduan/delete/{id}', [PengaduanController::class, 'deletePengaduanDashboard'])->name('admin.pengaduan.delete');

    Route::get('/admin/pengaduan/cetakLaporanPdf/{file?}', [PengaduanController::class, 'cetakLaporanPdf'])->name('admin.pengaduan.pdf');

    Route::get('/admin/loker', [LokerController::class, 'showAllLokerDashboard'])->name('admin.loker');

    Route::get('/admin/loker/tambah', [LokerController::class, 'viewAddLokerDashboard'])->name('admin.loker.tambah');

    Route::post('/admin/loker/tambah', [LokerController::class, 'addLokerDashboard'])->name('admin.loker.tambah.post');

    Route::get('/admin/loker/edit/{slug?}', [LokerController::class, 'viewEditLokerDashboard'])->name('admin.loker.edit');

    Route::get('/admin/loker/preview/{slug?}', [LokerController::class, 'previewLokerDashboard'])->name('admin.loker.preview');

    Route::patch('/admin/loker/edit/{slug?}', [LokerController::class, 'editLokerDashboard'])->name('admin.loker.edit.patch');
    
    Route::delete('/admin/loker/delete/{slug?}', [LokerController::class, 'deleteLokerDashboard'])->name('admin.loker.delete');

    Route::post('/admin/loker/export-excel', [LokerController::class, 'excelLokerDashboard'])->name('admin.loker.excel');
});

Route::middleware(['auth', 'Penulis'])->group(function () {
    // Routes Penulis
    Route::get('/penulis', [DashboardController::class, 'readDataPenulisDashboard'])->name('penulis');

    Route::get('/penulis/berita', [PenulisBeritaController::class, 'showAllBeritaDashboard'])->name('penulis.berita');

    Route::get('/penulis/berita/tambah', [PenulisBeritaController::class, 'viewAddBeritaDashboard'])->name('penulis.berita.tambah');

    Route::post('/penulis/berita/tambah', [PenulisBeritaController::class, 'addBeritaDashboard'])->name('penulis.berita.tambah.post');

    Route::get('/penulis/berita/edit/{slug?}', [PenulisBeritaController::class, 'viewEditBeritaDashboard'])->name('penulis.berita.edit');

    Route::get('/penulis/berita/preview/{slug?}', [PenulisBeritaController::class, 'previewBeritaDashboard'])->name('penulis.berita.preview');

    Route::patch('/penulis/berita/edit/{slug?}', [PenulisBeritaController::class, 'editBeritaDashboard'])->name('penulis.berita.edit.patch');

    Route::delete('/penulis/berita/delete/{slug?}', [PenulisBeritaController::class, 'deleteBeritaDashboard'])->name('penulis.berita.delete');
});

Route::middleware(['auth', 'PenyediaLoker'])->group(function () {
    // Routes Penulis
    Route::get('/penyedia-loker', [DashboardController::class, 'readDataPenyediaLokerDashboard'])->name('penyedia-loker');

    Route::get('/penyedia-loker/loker', [PenyediaLokerController::class, 'showAllLokerDashboard'])->name('penyedia-loker.loker');

    Route::get('/penyedia-loker/loker/applier', [PenyediaLokerController::class, 'showAllApplier'])->name('penyedia-loker.loker.applier');

    Route::post('/penyedia-loker/loker/applier/approve', [PenyediaLokerController::class, 'approveLokerDashboard'])->name('penyedia-loker.loker.applier.approve');

    Route::post('/penyedia-loker/loker/applier/reject', [PenyediaLokerController::class, 'rejectLokerDashboard'])->name('penyedia-loker.loker.applier.reject');

    Route::get('/penyedia-loker/loker/tambah', [PenyediaLokerController::class, 'viewAddLokerDashboard'])->name('penyedia-loker.loker.tambah');

    Route::post('/penyedia-loker/loker/tambah', [PenyediaLokerController::class, 'addLokerDashboard'])->name('penyedia-loker.loker.tambah.post');

    Route::get('/penyedia-loker/loker/edit/{slug?}', [PenyediaLokerController::class, 'viewEditLokerDashboard'])->name('penyedia-loker.loker.edit');
   
    Route::get('/penyedia-loker/loker/preview/{slug?}', [PenyediaLokerController::class, 'previewLokerDashboard'])->name('penyedia-loker.loker.preview');

    Route::patch('/penyedia-loker/loker/edit/{slug?}', [PenyediaLokerController::class, 'editLokerDashboard'])->name('penyedia-loker.loker.edit.patch');

    Route::delete('/penyedia-loker/loker/delete/{slug?}', [PenyediaLokerController::class, 'deleteLokerDashboard'])->name('penyedia-loker.loker.delete');
});


// --- example
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'User'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
