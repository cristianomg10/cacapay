<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransacaoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'data' => $this->data,
            'cliente' => new ClienteResource($this->cliente),
            'empresa_parceira' => new EmpresaParceiraResource($this->empresaParceira),
            'valor' => $this->valor,
            'status' => new StatusTransacaoResource($this->statusTransacao),
        ];
    }
}
