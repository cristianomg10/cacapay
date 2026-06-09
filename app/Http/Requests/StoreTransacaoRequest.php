<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => ['required', 'integer', 'exists:clientes,id'],
            'data' => ['required', 'date'],
            'empresa_parceira_id' => ['required', 'integer', 'exists:empresas_parceiras,id'],
            'valor' => ['required', 'numeric', 'min:0.01'],
            'status_id' => ['required', 'integer', 'exists:status_transacoes,id'],
        ];
    }
}
