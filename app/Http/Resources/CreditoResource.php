<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cliente' => new ClienteResource($this->cliente),
            'valor' => $this->valor,
            'data' => $this->data,
        ];
    }
}
