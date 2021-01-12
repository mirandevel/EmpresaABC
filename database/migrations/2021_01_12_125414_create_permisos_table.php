<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('motivo');

            $table->unsignedBigInteger('tec_id');
            $table->unsignedBigInteger('asistencia_id');

            $table->foreign('tec_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('asistencia_id')->references('id')->on('asistencias')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
