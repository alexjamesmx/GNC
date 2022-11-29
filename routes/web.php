<?php

use App\Http\Controllers\ControlController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ParqueController;
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

Route::get('/', [AccessController::class, 'index'])->middleware(['accesos'])->name('access');
Route::post('/message', [AccessController::class, 'message'])->middleware(['accesos'])->name('message');



Route::get('/admin', [AdminController::class, 'index'])->middleware(['accesos', 'admin'])->name('admin');
Route::prefix('/admin/parques')->middleware(['accesos', 'admin'])->controller(ParqueController::class)->group(function () {
    Route::get('/',                 'home')         ->name('parques.home');
    Route::post('/store',           'store')        ->name('parques.store');
    Route::post('/actualizar/{id}', 'actualizar')   ->name('parques.actualizar');
    Route::patch('/update/{id}',    'update')       ->name('parques.update');
    Route::get('/get/{id}',         'get')          ->name('parques.get');
    Route::post('/delete/{id}',     'delete')       ->name('parques.delete');
});


Route::prefix('/admin/empresas')->middleware(['accesos','admin'])->controller(EnterpriseController::class)->group(function () {
    Route::get('/',                 'home')         ->name('empresas.home');
    Route::get('/get/{id}',         'get')          ->name('enterprise.get');
    Route::get('/get_user/{id}',     'get_user')          ->name('enterprise.get_user');
    Route::post('/validated',       'validated')    ->name('enterprise.validated');
    Route::post('/store',           'store')        ->name('enterprise.store');
    Route::post('/delete/{id}',     'delete')       ->name('enterprise.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/', [ControlController::class, 'error401'])->middleware('accesos')->name('error401');

Route::fallback(function () {
    return view('errors.404');
});


require __DIR__ . '/auth.php';
