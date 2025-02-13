<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string ('descricao');
            $table->string ('endereco');
            $table->foreignId('responsavel_id')->constrained('users')->onDelete('cascade');
            $table->string ('codigo_acesso')->unique();
            $table->enum('status',['em andamento', 'concluida', 'em espera']);
            $table->date('data_inicio');
            $table->date('data_prevista_conclusao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
