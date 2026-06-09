<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'unique:clientes,cpf'],
            'telefone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:clientes,email'],
            'senha' => ['required', 'string', 'min:6'],
            'numero_conta' => ['required', 'string', 'max:20', 'unique:clientes,numero_conta'],
            'saldo' => ['required', 'numeric', 'min:0'],
            'cidade_id' => ['required', 'integer', 'exists:cidades,id'],
        ];
    }
}
