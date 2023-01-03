<?php

use App\Http\Controllers\ControlController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ParqueController;
use App\Http\Controllers\SubestacionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\InspeccionesController;
use App\Http\Controllers\TecnicoController;
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
//ADMINISTRAODR ************************************************************
Route::get('/admin', [SectionController::class, 'admin'])->middleware(['accesos', 'admin'])->name('admin');
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
Route::prefix('/admin/usuarios')->middleware(['accesos', 'admin'])->controller(UsersController::class)->group(function () {
    Route::get('/', 'home')->name('users.home');
    Route::post('/store', 'store')->name('users.store');
    Route::post('/get_user', 'get_user')->name('users.get_user');
    Route::post('/disable', 'disable')->name('users.disable');
});
Route::prefix('/admin/inspecciones')->middleware(['accesos', 'admin'])->controller(InspeccionesController::class)->group(function () {
    Route::get('/',                 'home')->name('inspeccion.home');
    Route::post('/store',           'store')->name('inspeccion.store');
    Route::post('/delete/{id}',     'delete')->name('inspeccion.delete');
    Route::post('/getParques',    'getParques')->name('inspeccion.getParques');
    Route::post('/getSubestaciones',    'getSubestaciones')->name('inspeccion.getSubestaciones');
});
//ADMINISTRAODR ************************************************************

//TECNICO ************************************************************

Route::get('/tecnico', [SectionController::class, 'tecnico'])->middleware(['accesos', 'tecnico'])->name('tecnico');

Route::prefix('/tecnico')->controller(TecnicoController::class)->group(function () {
    Route::get('/test/{id}',            'test')->middleware(['accesos', 'tecnico'])->name('tecnico.test');
    Route::get('/edificio/{id}',        'edificio')->middleware(['accesos', 'tecnico', 'inspeccion_edificio'])->name('tecnico.ins_edificio');
    Route::post('/edificio/subir',      'edificio_subir')->middleware(['accesos', 'tecnico'])->name('tecnico.edificio_subir');
    Route::post('/anomalia',            'anomalia')->middleware(['accesos', 'tecnico'])->name('tecnico.anomalia');
    Route::post('/anomalia_validar',    'anomalia_validar')->middleware(['accesos', 'tecnico'])->name('tecnico.anomalia_validar');
    Route::get('/electrica/{id}',       'electrica')->middleware(['accesos', 'tecnico'])->name('tecnico.ins_electrica');
    Route::post('/electrica/subir',     'electrica_subir')->middleware(['accesos', 'tecnico'])->name('tecnico.electrica_subir');
    Route::get('/transformador/{id}',   'transformador')->middleware(['accesos', 'tecnico', 'inspeccion_transformador'])->name('tecnico.ins_transformador');
    Route::post('/transformador/subir',     'transformador_subir')->middleware(['accesos', 'tecnico'])->name('tecnico.ins_transformador_subir');
});
Route::get('/empresa', [SectionController::class, 'empresa'])->middleware(['accesos', 'empresa'])->name('empresa');

//TECNICO ************************************************************
//LOGIN ************************************************************
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//LOGIN ************************************************************

Route::fallback(function () {
    return view('errors.404');
});


require __DIR__ . '/auth.php';
