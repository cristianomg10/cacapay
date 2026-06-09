<?php

use App\Models\Cidade;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Cidade::firstOrCreate(
            ['nome' => 'Não Informada'],
            ['uf' => 'NA']
        );
    }

    public function down(): void
    {
        Cidade::where('nome', 'Não Informada')->where('uf', 'NA')->delete();
    }
};
