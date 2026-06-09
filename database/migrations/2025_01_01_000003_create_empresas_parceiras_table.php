<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresas_parceiras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razao_social', 255);
            $table->string('cnpj', 18)->unique();
            $table->string('telefone', 20);
            $table->string('email', 255)->unique();
            $table->string('token_acesso', 60)->unique();
            $table->decimal('saldo', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas_parceiras');
    }
};
