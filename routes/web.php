<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AdminController;
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


Route::get('/', [AccessController::class, 'index'])->middleware(['auth', 'verified'])->name('access');


Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin');
// Route::get('/admin/parques', [AdminController::class, 'parques'])->middleware(['auth', 'verified'])->name('admin');

Route::resource('/admin/parques', ParqueController::class)->middleware(['auth', 'verified']);
Route::post('/admin/parques/delete/{id}', [ParqueController::class, 'delete'])->middleware(['auth', 'verified'])->name('parques.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
