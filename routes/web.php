<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Auth\ClienteLoginController;
use App\Http\Controllers\Web\CidadeController;
use App\Http\Controllers\Web\ClienteController;
use App\Http\Controllers\Web\ClienteDashboardController;
use App\Http\Controllers\Web\CreditoController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\EmpresaParceiraController;
use App\Http\Controllers\Web\StatusTransacaoController;
use App\Http\Controllers\Web\TransacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/login', [ClienteLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [ClienteLoginController::class, 'login']);

    Route::middleware('auth:cliente')->group(function () {
        Route::post('/logout', [ClienteLoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [ClienteDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/extrato', [ClienteDashboardController::class, 'extrato'])->name('extrato');
    });
});

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('clientes', ClienteController::class); 
        Route::resource('cidades', CidadeController::class);
        Route::resource('empresas-parceiras', EmpresaParceiraController::class);
        Route::resource('status-transacoes', StatusTransacaoController::class);
        Route::resource('transacoes', TransacaoController::class)->parameters(["transacoes" => "transacao"]);
        Route::resource('creditos', CreditoController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
