<?php

use App\Http\Controllers\AdminFakultasController;
use App\Http\Controllers\AdminJasController;
use App\Http\Controllers\AdminJurusanController;
use App\Http\Controllers\AdminMahasiswaController;
use App\Http\Controllers\AdminQueueController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\limitConfirmController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\QueueChartController;
use App\Http\Controllers\userGuidesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserQueueController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.home');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/queue', [UserQueueController::class, 'index'])->name('queue');
    // Route::get('/queue', [UserQueueController::class, 'index'])->name('queue'); 
    Route::get('/edit/{id}', [UserQueueController::class, 'edit'])->name('edit');
    Route::post('/q/update/{id}', [UserQueueController::class, 'update'])->name('update');
    Route::get('/home', [HomeController::class, 'userHome'])->name('home');
    Route::get("/user/profile", [UserProfileController::class, 'index']);
    Route::post("/user/profile/update", [UserProfileController::class, 'update']);
    Route::post('/confirm/{id}', [UserQueueController::class, 'confirmJas'])->name('confirm');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard/download', [userGuidesController::class, 'downloadPdfFile']);
    Route::get('/admin/jurusan', [AdminJurusanController::class, 'index']);
    Route::get('/admin/jurusan/search', [AdminJurusanController::class, 'search'])->name('search');

    Route::get('/admin/fakultas', [AdminFakultasController::class, 'index']);

    Route::get('/admin/queue', [AdminQueueController::class, 'index']);
    Route::get('/admin/queue/search', [AdminQueueController::class, 'search'])->name('search');
    Route::post('/admin/queue/confirmQ', [AdminQueueController::class, 'confirmQ']);
    Route::get('/admin/qdone', [AdminQueueController::class, 'doneQ']);
    Route::get('/admin/qdone/export', [AdminQueueController::class, 'fileExport']);
    Route::get("/admin/queue/delete/{id}", [AdminQueueController::class, "destroy"]);

    Route::get('/admin/jas', [AdminJasController::class, 'index']);
    Route::get('/admin/jas/new', [AdminJasController::class, 'create']);
    Route::post('/admin/jas', [AdminJasController::class, 'store']);
    Route::get('/admin/editJas/{id}', [AdminJasController::class, 'edit']);
    Route::post('/admin/editJas/update/{id}', [AdminJasController::class, 'update'])->name('update');
    Route::get("/admin/jas/{id}", [AdminJasController::class, 'deleteJas']);

    Route::get('/admin/limitConfirm', [limitConfirmController::class, 'index']);
    Route::get('/admin/editLimitConfirm/{id}', [limitConfirmController::class, 'edit']);
    Route::post('/admin/editLimitConfirm/update/{id}', [limitConfirmController::class, 'update'])->name('update');

    Route::get('/admin/users', [AdminUserController::class, 'userList']);
    Route::post('/admin/import', [AdminUserController::class, 'userImport']);
    Route::get('/admin/export', [AdminUserController::class, 'userExport']);
    Route::get('/admin/users/search', [AdminUserController::class, 'search'])->name('search');
    Route::get('/admin/editUser/{id}', [AdminUserController::class, 'editConfirmJas']);
    Route::post('/admin/editUser/update/{id}', [AdminUserController::class, 'updateConfirmJas'])->name('update');
    Route::get("/deleteuser/{id}", [AdminUserController::class, "deleteUser"]);

    Route::get('/admin/generatePDF', [PDFController::class, 'generatePDF']);

    Route::get('/admin/dashboard', [QueueChartController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/mahasiswa', [AdminMahasiswaController::class, 'index']);
    Route::post('/admin/mahasiswa/import', [AdminMahasiswaController::class, 'mahasiswaImport']);
    Route::get('/admin/mahasiswa/search', [AdminMahasiswaController::class, 'search'])->name('search');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


Route::get('/about', function () {
    return view('front.about');
});
