<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaParceiraResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'razao_social' => $this->razao_social,
            'cnpj' => $this->cnpj,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'saldo' => $this->saldo,
        ];
    }
}
