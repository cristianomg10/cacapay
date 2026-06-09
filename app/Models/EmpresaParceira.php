<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpresaParceira extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'empresas_parceiras';

    protected $fillable = [
        'razao_social',
        'cnpj',
        'telefone',
        'email',
        'token_acesso',
        'saldo',
    ];

    protected $hidden = [
        'token_acesso',
    ];

    protected function casts(): array
    {
        return [
            'saldo' => 'decimal:2',
        ];
    }

    public function transacoes()
    {
        return $this->hasMany(Transacao::class, 'empresa_parceira_id');
    }
}
