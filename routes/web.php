<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PaymentsController;
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
    return view('index');
});

// clients routes
Route::prefix('clients')->group(function(){
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::post('/store', [ClientController::class, 'store'])->name('client.store');
    Route::get('/show/{client}', [ClientController::class, 'show'])->name('client.show');
    Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/update/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::post('/destroy/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
    Route::get('/create',[ClientController::class,'create'])->name('client.create');
});

Route::prefix('loans')->group(function(){
    Route::get('/', [LoanController::class, 'index'])->name('loan.index');
    Route::post('/store', [LoanController::class, 'store'])->name('loan.store');
    Route::get('/show/{loan}', [LoanController::class, 'show'])->name('loan.show');
    Route::get('/edit/{loan}', [LoanController::class, 'edit'])->name('loan.edit');
    Route::put('/update/{loan}', [LoanController::class, 'update'])->name('loan.update');
    Route::post('/destroy/{loan}', [LoanController::class, 'destroy'])->name('loan.destroy');
});
Route::prefix('payment')->group(function(){
    Route::post('/store', [PaymentsController::class, 'store'])->name('payment.store');
});

// end of clients routes

Route::get('/dashboard', function () {
    return view('dashboard');
});
