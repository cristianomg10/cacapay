<?php

use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\CreditoController;
use App\Http\Controllers\Api\EmpresaParceiraController;
use App\Http\Controllers\Api\StatusTransacaoController;
use App\Http\Controllers\Api\TransacaoController;
use Illuminate\Support\Facades\Route;

Route::post('/compras', [TransacaoController::class, 'comprar']);

Route::fallback(function () {
    return response()->json(['message' => 'Rota não encontrada.'], 404);
});

/*
Route::middleware('auth.empresa')->group(function () {
    Route::apiResource('cidades', CidadeController::class);
    Route::apiResource('clientes', ClienteController::class);
    Route::apiResource('empresas-parceiras', EmpresaParceiraController::class);
    Route::apiResource('status-transacoes', StatusTransacaoController::class);
    Route::apiResource('transacoes', TransacaoController::class);
    Route::apiResource('creditos', CreditoController::class);
});
*/