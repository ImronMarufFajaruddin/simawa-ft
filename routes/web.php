<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\UserSettingController;

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

/** for side bar menu active */
// function set_active($route)
// {
//     if (is_array($route)) {
//         return in_array(Request::path(), $route) ? 'active' : '';
//     }
//     return Request::path() == $route ? 'active' : '';
// }

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('/dashboard', DashboardController::class)->only([
//     'index'
// ]);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('data-user')->middleware('can:superadmin-only')->group(function () {
        Route::get('/', [UserAdminController::class, 'index'])->name('data-user.index');
        Route::post('/store', [UserAdminController::class, 'store'])->name('data-user.store');
        Route::delete('/destroy/{id}', [UserAdminController::class, 'destroy'])->name('data-user.destroy');
        Route::get('/edit/{id}', [UserAdminController::class, 'edit'])->name('data-user.edit');
        Route::put('/update/{id}', [UserAdminController::class, 'update'])->name('data-user.update');
    });

    Route::group(['prefix' => 'user-setting'], function () {
        Route::get('/', [UserSettingController::class, 'index'])->name('user-setting.index');
        Route::post('/store', [UserSettingController::class, 'store'])->name('user-setting.store');
        Route::get('/edit/{id}', [UserSettingController::class, 'edit'])->name('user-setting.edit');
        Route::post('/update', [UserSettingController::class, 'update'])->name('user-setting.update');
        Route::delete('/destroy/{id}', [UserSettingController::class, 'destroy'])->name('user-setting.destroy');
    });
});
