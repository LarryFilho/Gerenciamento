<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\OperationController;

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


Route::resource('cadastro', EncomendaController::class);

Route::get('cadastro', [EncomendaController::class, 'index'])->name('cadastro.index');

Route::get('/cadastro/create', [EncomendaController::class, 'create'])->name('cadastro.create');

Route::get('/cadastro/{id}/edit', [EncomendaController::class, 'edit'])->name('cadastro.edit');

Route::get('cadastro/{id}', [EncomendaController::class, 'show'])->name('encomendas.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/operations', OperationController::class);

Route::get('/operations', [OperationController::class, 'index'])->name('operations');

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
 
Route::get('operations/{operation}', [OperationController::class, 'show'])->name('operations.show');
});
use App\Http\Controllers\VisitorController;

Route::resource('visitors', VisitorController::class)->middleware('auth');

Route::get('visitors/{visitor}', [VisitorController::class, 'show'])->name('visitors.show');

use App\Http\Controllers\ResidentController;

Route::resource('residents', ResidentController::class);

use App\Http\Controllers\OccurrenceController;

Route::resource('occurrences', OccurrenceController::class);
