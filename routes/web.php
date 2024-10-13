<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/cadastro", EncomendaController::class);

Route::get('/cadastro', [EncomendaController::class, 'index'])->name('cadastro');

Route::get('/cadastro/create', [EncomendaController::class, 'create'])->name('cadastro.create');

Route::get('/cadastro/{id}/edit', [EncomendaController::class, 'edit'])->name('cadastro.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
