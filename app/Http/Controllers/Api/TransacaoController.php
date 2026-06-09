<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\StoreTransacaoRequest;
use App\Http\Requests\UpdateTransacaoRequest;
use App\Http\Resources\CompraResource;
use App\Http\Resources\TransacaoResource;
use App\Models\Transacao;
use App\Services\TransacaoService;

class TransacaoController extends Controller
{
    public function __construct(
        protected TransacaoService $transacaoService
    ) {}

    public function index()
    {
        return TransacaoResource::collection(Transacao::with('cliente', 'empresaParceira', 'statusTransacao')->get());
    }

    public function comprar(StoreCompraRequest $request)
    {
        try {
            $transacao = $this->transacaoService->realizarCompra($request->validated());
            return new CompraResource($transacao->load('cliente', 'empresaParceira', 'statusTransacao'), 201);
        } catch (\RuntimeException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function store(StoreTransacaoRequest $request)
    {
        try {
            $transacao = $this->transacaoService->criarTransacao($request->validated());
            return new TransacaoResource($transacao->load('cliente', 'empresaParceira', 'statusTransacao'), 201);
        } catch (\RuntimeException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function show(Transacao $transacao)
    {
        return new TransacaoResource($transacao->load('cliente', 'empresaParceira', 'statusTransacao'));
    }

    public function update(UpdateTransacaoRequest $request, Transacao $transacao)
    {
        try {
            $transacao = $this->transacaoService->atualizarTransacao($transacao, $request->validated());
            return new TransacaoResource($transacao->load('cliente', 'empresaParceira', 'statusTransacao'));
        } catch (\RuntimeException $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function destroy(Transacao $transacao)
    {
        $this->transacaoService->deletarTransacao($transacao);
        return response()->json(null, 204);
    }
}
