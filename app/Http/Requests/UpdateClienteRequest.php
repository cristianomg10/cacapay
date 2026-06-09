<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('cliente');
        return [
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', Rule::unique('clientes', 'cpf')->ignore($id)],
            'telefone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', Rule::unique('clientes', 'email')->ignore($id)],
            'senha' => ['nullable', 'string', 'min:6'],
            'numero_conta' => ['required', 'string', 'max:20', Rule::unique('clientes', 'numero_conta')->ignore($id)],
            'saldo' => ['required', 'numeric', 'min:0'],
            'cidade_id' => ['required', 'integer', 'exists:cidades,id'],
        ];
    }
}
