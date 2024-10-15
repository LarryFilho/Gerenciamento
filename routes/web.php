<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

use App\Http\Controllers\OperationController;

Route::middleware('auth')->group(function () {
    Route::resource('operations', OperationController::class);
    Route::get('/operations', [OperationController::class, 'index'])->name('operations.operationsindex');
});

Route::middleware('auth')->group(function () {
    Route::resource('operations', OperationController::class);
    Route::get('operations/{operation}/edit', [OperationController::class, 'edit'])->name('operations.edit');
    Route::put('operations/{operation}', [OperationController::class, 'update'])->name('operations.update');
});

Route::middleware('auth')->group(function () {
    Route::resource('operations', OperationController::class);
    Route::delete('operations/{operation}', [OperationController::class, 'destroy'])->name('operations.destroy');
});

Route::get('/operations/create', [OperationController::class, 'create'])->name('operations.create');


Route::post('/operations', [OperationController::class, 'store'])->name('operations.store');

Route::get('/operations', [OperationController::class, 'operationsindex'])->name('operations.index');

Route::middleware('auth')->group(function () {
    Route::resource('operations', OperationController::class);
    // Adicione a rota para detalhes
    Route::get('operations/{operation}', [OperationController::class, 'show'])->name('operations.show');
});