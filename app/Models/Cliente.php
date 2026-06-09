<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'clientes';

    protected $fillable = [
        'user_id',
        'nome',
        'cpf',
        'telefone',
        'email',
        'senha',
        'numero_conta',
        'saldo',
        'cidade_id',
    ];

    protected $hidden = [
        'senha',
    ];

    protected function casts(): array
    {
        return [
            'saldo' => 'decimal:2',
        ];
    }

    public function getAuthPassword(): string
    {
        return $this->senha;
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function creditos()
    {
        return $this->hasMany(Credito::class, 'cliente_id');
    }

    public function transacoes()
    {
        return $this->hasMany(Transacao::class, 'cliente_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
