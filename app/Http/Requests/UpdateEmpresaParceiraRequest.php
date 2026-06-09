<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmpresaParceiraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('empresa_parceira');
        return [
            'razao_social' => ['required', 'string', 'max:255'],
            'cnpj' => ['required', 'string', 'max:18', Rule::unique('empresas_parceiras', 'cnpj')->ignore($id)],
            'telefone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', Rule::unique('empresas_parceiras', 'email')->ignore($id)],
            'token_acesso' => ['required', 'string', 'max:60', Rule::unique('empresas_parceiras', 'token_acesso')->ignore($id)],
            'saldo' => ['required', 'numeric', 'min:0'],
        ];
    }
}
