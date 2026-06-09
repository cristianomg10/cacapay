<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompraResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'data' => $this->data,
            'valor' => $this->valor,
            'status' => new StatusTransacaoResource($this->statusTransacao),
            'cliente' => [
                'id' => $this->cliente->id,
                'nome' => $this->cliente->nome,
            ],
            'empresa_parceira' => [
                'id' => $this->empresaParceira->id,
                'razao_social' => $this->empresaParceira->razao_social,
            ],
        ];
    }
}