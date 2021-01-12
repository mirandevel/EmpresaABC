<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareaAsistidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea_asistida', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('hora_llegada');
            $table->time('hora_terminada')->nullable();
            $table->string('ubicacion');
            $table->date('fecha');
            $table->unsignedBigInteger('tec_id');
            $table->unsignedBigInteger('tarea_id');

            $table->foreign('tec_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('tarea_id')->references('id')->on('tareas')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarea_asistida');
    }
}
