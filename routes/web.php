<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
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


Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
        // Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    });
    // Route::get('/', function () {
    //     return redirect()->route('Admin.dashboard');
    // });
});
Route::middleware('auth')->group(function () {
    Route::middleware('role:user')->group(function () {
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    });
});

Route::middleware('guest')->group(
    function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/', [LoginController::class, 'login']);
        Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
    }
);

//make route to /dashboard
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/perusahaan', [PerusahaanController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);