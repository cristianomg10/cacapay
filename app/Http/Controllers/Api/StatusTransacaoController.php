<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusTransacaoRequest;
use App\Http\Requests\UpdateStatusTransacaoRequest;
use App\Http\Resources\StatusTransacaoResource;
use App\Models\StatusTransacao;

class StatusTransacaoController extends Controller
{
    public function index()
    {
        return StatusTransacaoResource::collection(StatusTransacao::all());
    }

    public function store(StoreStatusTransacaoRequest $request)
    {
        $status = StatusTransacao::create($request->validated());
        return new StatusTransacaoResource($status, 201);
    }

    public function show(StatusTransacao $statusTransacao)
    {
        return new StatusTransacaoResource($statusTransacao);
    }

    public function update(UpdateStatusTransacaoRequest $request, StatusTransacao $statusTransacao)
    {
        $statusTransacao->update($request->validated());
        return new StatusTransacaoResource($statusTransacao);
    }

    public function destroy(StatusTransacao $statusTransacao)
    {
        $statusTransacao->delete();
        return response()->json(null, 204);
    }
}
