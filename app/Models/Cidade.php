<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';

    protected $fillable = [
        'nome',
        'uf',
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'cidade_id');
    }
}
