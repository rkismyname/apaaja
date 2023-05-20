<?php

use App\Http\Controllers\Admin\MasterDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Customer\PengajuanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
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
// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/', [LoginController::class, 'index'])->middleware('guest');
// Route::post('/', [LoginController::class, 'login'])->name('login');
// Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [RegisterController::class, 'dashboard'])->name('dashboard');
// Route::get('/user', [UserController::class, 'index']);

//Routing Role : Admin
Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [DashboardController::class, 'dashboardAdmin'])->name('admin');
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/admin/md-perorangan', [MasterDataController::class, 'showPerorangan'])->name('md_tk');
        Route::get('admin/md-perusahaan', [MasterDataController::class, 'showPerusahaan'])->name('md_bu');
        // Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    });
    // Route::get('/', function () {
    //     return redirect()->route('Admin.dashboard');
    // });
});

//Routing Role : User
Route::middleware('auth')->group(function () {
    Route::middleware('role:user')->group(function () {
        Route::get('/customer', [DashboardController::class, 'dashboardCustomer'])->name('customer');
        Route::get('/perusahaan', [PengajuanController::class, 'sertif_bu'])->name('form_bu');
        Route::post('/perusahaan', [PengajuanController::class, 'store'])->name('syarat_bu');
        Route::get('/perorangan', [PengajuanController::class, 'sertif_tk'])->name('form_tk');
        Route::post('/perorangan', [PengajuanController::class, 'stored'])->name('syarat_tk');
    });
});

Route::middleware('guest')->group(
    function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/', [LoginController::class, 'login']);
        Route::get('/register', [RegisterController::class, 'index']);
        Route::post('/register', [RegisterController::class, 'store'])->name('register');
    }
);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// make route to /dashboard
// Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store'])->name('register');