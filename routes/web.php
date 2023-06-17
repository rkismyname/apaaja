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
        Route::get('/md/md-perorangan', [MasterDataController::class, 'showPerorangan'])->name('md_tk');
        Route::get('/md/md-perusahaan', [MasterDataController::class, 'showPerusahaan'])->name('md_bu');
        Route::get('/md/detail-md-perorangan/{perorangan_id}', [MasterDataController::class, 'detailPerorangan_md'])->name('detailMD.tk');
        Route::get('/md/detail-md-perusahaan/{perusahaan_id}', [MasterDataController::class, 'detailPerusahaan_md'])->name('detailMD.bu');
        //Pengajuan
        Route::get('/pengajuan/pengajuan-tk', [ViewPengajuanController::class, 'peroranganAdmin'])->name('view_tk');
        Route::get('/pengajuan/pengajuan-bu', [ViewPengajuanController::class, 'perusahaanAdmin'])->name('view_bu');
        Route::get('/pengajuan/detail-pengajuan/{perorangan_id}', [ViewPengajuanController::class, 'detailPengajuan'])->name('detail_pengajuan');
        Route::get('/pengajuan/details-pengajuan/{perusahaan_id}', [ViewPengajuanController::class, 'detailsPengajuan'])->name('details_pengajuan');
        Route::get('/pengajuan/detail-pengajuan/update-status-tk/{tk_id}', [ViewPengajuanController::class, 'statusBerkasTk'])->name('status.tk');
        Route::get('/pengajuan/details-pengajuan/update-status-bu/{bu_id}', [ViewPengajuanController::class, 'statusBerkasBu'])->name('status.bu');
        //Layanan
        Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
        Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
        Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
        Route::get('/layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
        Route::put('/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
        Route::delete('/layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');
        Route::get('/layanan/{kategori}', [LayananController::class, 'getLayananByKategori'])->name('layanan.get');
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
            Route::get('/perusahaan/list', [PengajuanController::class, 'listPerusahaan'])->name('list.bu');
            Route::get('/perusahaan/list/{perusahaan_id}/edit', [PengajuanController::class, 'editPerusahaan'])->name('list.bu.edit');
            Route::put('/perusahaan/list/{perusahaan_id}', [PengajuanController::class, 'updatePerusahaan'])->name('list.bu.update');
            Route::delete('/perusahaan/list/{perusahaan_id}', [PengajuanController::class, 'deletePerusahaan'])->name('list.bu.delete');
            //#########
            Route::get('/perusahaan/data', [PengajuanController::class, 'dataPerusahaan'])->name('data.bu');
            Route::post('/perusahaan/data', [PengajuanController::class, 'storedData'])->name('dataBu.store');
            Route::get('/perusahaan', [PengajuanController::class, 'sertif_bu'])->name('form_bu');
            Route::post('/perusahaan', [PengajuanController::class, 'store'])->name('syarat_bu');
            Route::get('/get-nama-perusahaan', [PengajuanController::class, 'getNamaPerusahaan'])->name('perusahaan.get');
            //Pengajuan Tenaga Kerja
            Route::get('/perorangan/list', [PengajuanController::class, 'listPerorangan'])->name('list.tk');
            Route::get('/perorangan/list/{perorangan_id}/edit', [PengajuanController::class, 'editPerorangan'])->name('list.tk.edit');
            Route::put('/perorangan/list/{perorangan_id}', [PengajuanController::class, 'updatePerorangan'])->name('list.tk.update');
            Route::delete('/perorangan/list/{perorangan_id}', [PengajuanController::class, 'deletePerorangan'])->name('list.tk.delete');
            //#########
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

Route::get('/test', [MasterDataController::class, 'testModal']);
