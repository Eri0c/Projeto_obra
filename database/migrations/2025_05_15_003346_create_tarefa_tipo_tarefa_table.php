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
        Schema::create('tarefa_tipo_tarefa', function (Blueprint $table) {
    $table->foreignId('tarefas_id')->constrained('tarefas')->onDelete('cascade');
    $table->foreignId('tipo_tarefa_id')->constrained('tipo_tarefas')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa_tipo_tarefa');
    }
};
