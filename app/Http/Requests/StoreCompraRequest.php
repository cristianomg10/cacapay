<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cpf' => ['required', 'string', 'max:14'],
            'nome' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255'],
            'token' => ['required', 'string', 'exists:empresas_parceiras,token_acesso'],
            'valor' => ['required', 'numeric', 'min:0.01'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->has('cpf')) {
                $clienteExiste = Cliente::where('cpf', $this->cpf)->exists();

                if (!$clienteExiste) {
                    if (!$this->filled('nome')) {
                        $validator->errors()->add('nome', 'O campo nome é obrigatório quando o CPF não está cadastrado.');
                    }
                    if (!$this->filled('email')) {
                        $validator->errors()->add('email', 'O campo email é obrigatório quando o CPF não está cadastrado.');
                    }
                }
            }
        });
    }
}