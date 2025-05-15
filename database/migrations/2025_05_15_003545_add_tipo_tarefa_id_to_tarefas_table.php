<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('tarefas', function (Blueprint $table) {
        $table->unsignedBigInteger('tipo_tarefa_id')->after('status');

        $table->foreign('tipo_tarefa_id')->references('id')->on('tipo_tarefas')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('tarefas', function (Blueprint $table) {
        $table->dropForeign(['tipo_tarefa_id']);
        $table->dropColumn('tipo_tarefa_id');
    });
}

};
