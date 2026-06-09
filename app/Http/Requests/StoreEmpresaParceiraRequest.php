<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpresaParceiraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'razao_social' => ['required', 'string', 'max:255'],
            'cnpj' => ['required', 'string', 'max:18', 'unique:empresas_parceiras,cnpj'],
            'telefone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:empresas_parceiras,email'],
            'token_acesso' => ['required', 'string', 'max:60', 'unique:empresas_parceiras,token_acesso'],
            'saldo' => ['required', 'numeric', 'min:0'],
        ];
    }
}
