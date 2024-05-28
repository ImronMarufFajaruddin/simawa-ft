<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserAdminController;

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
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}


Route::get('/', function () {
    return view('welcome');
});
Route::resource('/dashboard', DashboardController::class)->only([
    'index'
]);

Route::group(['prefix' => 'data-user'], function () {
    Route::get('/', [UserAdminController::class, 'index'])->name('data-user.index');
    Route::post('/store', [UserAdminController::class, 'store'])->name('data-user.store');
    Route::delete('/destroy/{id}', [UserAdminController::class, 'destroy'])->name('data-user.destroy');
    Route::get('/edit/{id}', [UserAdminController::class, 'edit'])->name('data-user.edit');
    Route::put('/update/{id}', [UserAdminController::class, 'update'])->name('data-user.update');
});
