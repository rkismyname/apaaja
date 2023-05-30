<?php

use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\MasterDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Customer\PengajuanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ViewPengajuanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Logout;

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

//Routing Role : Admin
Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        //Dashboard
        Route::get('/admin', [DashboardController::class, 'dashboardAdmin'])->name('admin');
        //Master Data
        Route::get('/admin/md-perorangan', [MasterDataController::class, 'showPerorangan'])->name('md_tk');
        Route::get('admin/md-perusahaan', [MasterDataController::class, 'showPerusahaan'])->name('md_bu');
        //Pengajuan
        Route::get('/admin/pengajuan-tk', [ViewPengajuanController::class, 'peroranganAdmin'])->name('view_tk');
        Route::get('/admin/pengajuan-bu', [ViewPengajuanController::class, 'perusahaanAdmin'])->name('view_bu');
        //Layanan
        Route::get('/admin/layanan', [LayananController::class, 'index'])->name('layanan');
        Route::get('/admin/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
        Route::post('/admin/layanan', [LayananController::class, 'store'])->name('layanan.store');
        Route::get('/admin/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
        Route::put('/admin/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
        Route::delete('/admin/layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');
        Route::get('/admin/layanan/{kategori}', [LayananController::class, 'getLayananByKategori'])->name('layanan.get');
        //User
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    //Routing Role : User
    Route::middleware('auth')->group(function () {
        Route::middleware('role:user')->group(function () {
            Route::get('/customer', [DashboardController::class, 'dashboardCustomer'])->name('customer');
            //Pengajuan Badan Usaha
            Route::get('/perusahaan/data', [PengajuanController::class, 'dataPerusahaan'])->name('data.bu');
            Route::post('/perusahaan/data', [PengajuanController::class, 'storedData'])->name('dataBu.store');
            Route::get('/perusahaan', [PengajuanController::class, 'sertif_bu'])->name('form_bu');
            Route::post('/perusahaan', [PengajuanController::class, 'store'])->name('syarat_bu');
            Route::get('/get-nama-perusahaan', [PengajuanController::class, 'getNamaPerusahaan'])->name('perusahaan.get');
            //Pengajuan Tenaga Kerja
            Route::get('/perorangan/data', [PengajuanController::class, 'dataDiri'])->name('data.tk');
            Route::post('perorangan/data', [PengajuanController::class, 'storeData'])->name('dataTk.store');
            Route::get('/perorangan', [PengajuanController::class, 'sertif_tk'])->name('form_tk');
            Route::post('/perorangan', [PengajuanController::class, 'stored'])->name('syarat_tk');
            Route::get('/get-nama-perorangan', [PengajuanController::class, 'getNamaPerorangan'])->name('perorangan.get');
            //AJAX KATEGORI
            Route::get('/customer/pengajuan/{kategori}', [PengajuanController::class, 'getPengajuanByKategori'])->name('pengajuan.get');
            
        });
    });
});

Route::middleware('guest')->group(
    function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/', [LoginController::class, 'login']);
    }
);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/profile/{user}/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
