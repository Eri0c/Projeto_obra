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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained('obra')->onDelete('cascade');
            $table->foreignId('colaborador_id')->constrained('colaborador')->onDelete('cascade');
            $table->string ('titulo');
            $table->string ('descricao');
            $table->string ('status');
            $table->date ('data_inicio');
            $table->date ('data_fim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
