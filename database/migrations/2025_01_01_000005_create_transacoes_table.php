<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('data');
            $table->unsignedBigInteger('empresa_parceira_id');
            $table->decimal('valor', 15, 2);
            $table->unsignedBigInteger('status_id');
            $table->foreign('empresa_parceira_id')->references('id')->on('empresas_parceiras');
            $table->foreign('status_id')->references('id')->on('status_transacoes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transacoes');
    }
};
