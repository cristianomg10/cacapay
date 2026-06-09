<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $table = 'creditos';

    protected $fillable = [
        'cliente_id',
        'valor',
        'data',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'datetime',
            'valor' => 'decimal:2',
        ];
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
