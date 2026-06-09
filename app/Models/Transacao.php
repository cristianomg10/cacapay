<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transacoes';

    protected $fillable = [
        'data',
        'cliente_id',
        'empresa_parceira_id',
        'valor',
        'status_id',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'datetime',
            'valor' => 'decimal:2',
        ];
    }

    public function empresaParceira()
    {
        return $this->belongsTo(EmpresaParceira::class, 'empresa_parceira_id');
    }

    public function statusTransacao()
    {
        return $this->belongsTo(StatusTransacao::class, 'status_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
