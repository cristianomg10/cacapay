<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTransacao extends Model
{
    use HasFactory;

    protected $table = 'status_transacoes';

    protected $fillable = [
        'nome',
    ];

    public function transacoes()
    {
        return $this->hasMany(Transacao::class, 'status_id');
    }
}
