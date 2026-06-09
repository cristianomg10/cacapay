<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStatusTransacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('status_transacao');
        return [
            'nome' => ['required', 'string', 'max:100', Rule::unique('status_transacoes', 'nome')->ignore($id)],
        ];
    }
}
