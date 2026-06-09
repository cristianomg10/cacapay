<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditoRequest;
use App\Http\Requests\UpdateCreditoRequest;
use App\Http\Resources\CreditoResource;
use App\Models\Credito;
use App\Services\CreditoService;

class CreditoController extends Controller
{
    private CreditoService $creditoService;

    public function __construct(CreditoService $creditoService)
    {
        $this->creditoService = $creditoService;
    }

    public function index()
    {
        return CreditoResource::collection(Credito::with('cliente.cidade')->get());
    }

    public function store(StoreCreditoRequest $request)
    {
        $credito = $this->creditoService->criarCredito($request->validated());
        return new CreditoResource($credito->load('cliente.cidade'), 201);
    }

    public function show(Credito $credito)
    {
        return new CreditoResource($credito->load('cliente.cidade'));
    }

    public function update(UpdateCreditoRequest $request, Credito $credito)
    {
        $credito = $this->creditoService->atualizarCredito($credito, $request->validated());
        return new CreditoResource($credito->load('cliente.cidade'));
    }

    public function destroy(Credito $credito)
    {
        $this->creditoService->deletarCredito($credito);
        return response()->json(null, 204);
    }
}
