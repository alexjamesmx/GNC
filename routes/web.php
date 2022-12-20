<?php

use App\Http\Controllers\ControlController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ParqueController;
use App\Http\Controllers\SubestacionController;
use App\Http\Controllers\InspeccionesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Theseroutes/web.php
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AccessController::class, 'index'])->middleware(['accesos'])->name('access');
Route::post('/message', [AccessController::class, 'message'])->middleware(['accesos'])->name('message');



Route::get('/admin', [AdminController::class, 'index'])->middleware(['accesos', 'admin'])->name('admin');
Route::prefix('/admin/parques')->middleware(['accesos', 'admin'])->controller(ParqueController::class)->group(function () {
    Route::get('/',                 'home')->name('parques.home');
    Route::post('/store',           'store')->name('parques.store');
    Route::post('/actualizar/{id}', 'actualizar')->name('parques.actualizar');
    Route::get('/get/{id}',         'get')->name('parques.get');
    Route::post('/delete/{id}',     'delete')->name('parques.delete');
});


Route::prefix('/admin/empresas')->middleware(['accesos', 'admin'])->controller(EnterpriseController::class)->group(function () {
    Route::get('/',                 'home')->name('empresas.home');
    Route::get('/get/{id}',         'get')->name('enterprise.get');
    Route::get('/get_user/{id}',     'get_user')->name('enterprise.get_user');
    Route::get('/get_parque/{id}',     'get_parque')->name('enterprise.get_parque');
    Route::post('/validated',       'validated')->name('enterprise.validated');
    Route::post('/validated_update',       'validated_update')->name('enterprise.validated_update');
    Route::post('/store',           'store')->name('enterprise.store');
    Route::post('/update/{id}',           'update_enterprise')->name('enterprise.update');
    Route::post('/delete/{id}',     'delete')->name('enterprise.delete');
});


Route::prefix('/admin/subestaciones')->middleware(['accesos', 'admin'])->controller(SubestacionController::class)->group(function () {
    Route::get('/',                 'home')->name('subestacion.home');
    Route::post('/store',           'store')->name('subestacion.store');
    Route::post('/update/{id}',           'update')->name('subestacion.update');
    Route::post('/delete/{id}',     'delete')->name('subestacion.delete');
    Route::post('/get_parques_by_name',     'get_parques_by_name')->name('subestacion.get_parques_by_name');
    Route::post('/get_parques_by_id',     'get_parques_by_id')->name('subestacion.get_parques_by_id');
    Route::post('/get_enterprise_id_on_select',     'get_enterprise_id_on_select')->name('subestacion.get_enterprise_id_on_select');
});

Route::prefix('/admin/inspecciones')->middleware(['accesos', 'admin'])->controller(InspeccionesController::class)->group(function () {
    Route::get('/',                 'home')->name('inspeccion.home');
    Route::post('/store',           'store')->name('inspeccion.store');
    Route::post('/delete/{id}',     'delete')->name('inspeccion.delete');
    Route::post('/get_parques_x_enterprise',    'get_parques_x_enterprise')->name('inspeccion.get_parques_x_enterprise');
});

Route::prefix('/admin/usuarios')->middleware(['accesos', 'admin'])->controller(UsersController::class)->group(function () {
    Route::get('/', 'home')->name('users.home');
    Route::post('/store', 'store')->name('users.store');
    Route::post('/get_user', 'get_user')->name('users.get_user');
    Route::post('/disable', 'disable')->name('users.disable');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::fallback(function () {
    return view('errors.404');
});


require __DIR__ . '/auth.php';
