<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\AdminKab\AdminKabDashboard;
use App\Http\Controllers\AdminKab\DocumentController as AdminKabDocumentController;
use App\Http\Controllers\AdminKab\SekolahController as AdminKabSekolahController;
use App\Http\Controllers\AdminKab\SiswaController as AdminKabSiswaController;
use App\Http\Controllers\Admin\AdminUmkmController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DataUmkmController;
use App\Http\Controllers\User\UmkmController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\User\SiswaController;
use App\Http\Controllers\User\UserDashboard;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('landing_page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('ubah-password',[UserController::class,'changePassword'])->name('ubah-password');
    Route::post('update-password',[UserController::class,'updatePassword'])->name('update-password');
    Route::prefix('user/home')->name('user.')->middleware('ensureUserRole:1')->group(function(){
        Route::get('/',[UserDashboard::class,'index'])->name('dashboard');
        Route::resource('umkm', UmkmController::class);
        Route::post('/umkm/data-alamat',[UmkmController::class,'updateDataAlamat'])->name('umkm.updateDataAlamat');
        Route::post('/umkm/pilihan-kecamatan',[UmkmController::class, 'updatePilihanKecamatan'])->name('umkm.updatePilihanKecamatan');
        Route::post('/umkm/upload-foto',[UmkmController::class, 'uploadFoto'])->name('umkm.uploadFoto');
        Route::resource('document',DocumentController::class);
        Route::get('/cetak-formulir',[UmkmController::class, 'indexCetak'])->name('cetak-formulir');
        Route::get('/download-pdf',[UmkmController::class, 'downloadPDF'])->name('download-pdf');
        Route::get('/show-pdf',[UmkmController::class, 'showPdf'])->name('show-pdf');
        Route::get('/data-umkm',[DataUmkmController::class,'index'])->name('data-umkm');
        Route::post('/edit-data-umkm',[DataUmkmController::class,'edit'])->name('editDataUmkm');
        Route::post('/update-data-umkm',[DataUmkmController::class,'update'])->name('updateDataUmkm');
        Route::post('/hapus-data-umkm',[DataUmkmController::class,'destroy'])->name('hapusDataUmkm');
        Route::post('/update-status',[DataUmkmController::class,'updateStatus'])->name('update-status');

        Route::get('/data-berkas',[DocumentController::class,'dataBerkas'])->name('umkm.index-document');
        Route::get('/download-tempat/{id}',[DocumentController::class,'downloadTempat'])->name('umkm.download_tempat');
        Route::get('/download-kk/{id}',[DocumentController::class,'downloadKk'])->name('umkm.download_kk');
        Route::get('/download-ktp/{id}',[DocumentController::class,'downloadKtp'])->name('umkm.download_ktp');
        Route::get('/download-sku/{id}',[DocumentController::class,'downloadSku'])->name('umkm.download_sku');
        Route::post('/edit-document',[DocumentController::class,'edit'])->name('umkm.edit-document');
        Route::post('/update-document',[DocumentController::class,'update'])->name('umkm.update-document');
        Route::post('/hapus-document',[DocumentController::class,'destroy'])->name('umkm.destroy-document');
    });
    Route::prefix('admin/home')->name('admin.')->middleware('ensureAdminRole:2')->group(function(){
        //update
        Route::get('/',[AdminDashboard::class,'index'])->name('dashboard');
        Route::get('/data-umkm',[AdminUmkmController::class,'index'])->name('umkm.data-umkm');
        Route::post('/edit-data-umkm',[AdminUmkmController::class,'edit'])->name('umkm.editDataUmkm');
        Route::post('/update-data-umkm',[AdminUmkmController::class,'update'])->name('umkm.updateDataUmkm');
        Route::post('/hapus-data-umkm',[AdminUmkmController::class,'destroy'])->name('umkm.hapusDataUmkm');
        Route::get('/data-berkas',[AdminDocumentController::class,'index'])->name('umkm.index-document');
        Route::get('/download-tempat/{id}',[AdminDocumentController::class,'downloadTempat'])->name('umkm.download_tempat');
        Route::get('/download-kk/{id}',[AdminDocumentController::class,'downloadKk'])->name('umkm.download_kk');
        Route::get('/download-ktp/{id}',[AdminDocumentController::class,'downloadKtp'])->name('umkm.download_ktp');
        Route::get('/download-sku/{id}',[AdminDocumentController::class,'downloadSku'])->name('umkm.download_sku');
        Route::post('/edit-document',[AdminDocumentController::class,'edit'])->name('umkm.edit-document');
        Route::post('/update-document',[AdminDocumentController::class,'update'])->name('umkm.update-document');
        Route::post('/hapus-document',[AdminDocumentController::class,'destroy'])->name('umkm.destroy-document');
        Route::post('/update-status',[AdminUmkmController::class,'updateStatus'])->name('umkm.update-status');
    });
    
});



require __DIR__.'/auth.php';
