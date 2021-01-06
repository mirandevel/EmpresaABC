<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->time('hora_inicio');
            $table->string('fecha');
            $table->string('ubicacion');
            $table->string('descripcion');
            $table->boolean('estado');
            $table->unsignedBigInteger('adm_id');
            $table->unsignedBigInteger('tec_id');
            $table->unsignedBigInteger('cli_id');

            $table->foreign('adm_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('tec_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('cli_id')->references('id')->on('clientes')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
