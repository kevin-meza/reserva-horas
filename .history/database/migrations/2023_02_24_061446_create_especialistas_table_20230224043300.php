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
        Schema::create('especialistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('rut');
            $table->string('fecha_nacimiento');
            $table->integer('id_especialidad')->unsigned();
            $table->foreign('id_especialidad')->references('id')->on('especialidades');

            $table->string('correo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialistas');
        Schema::table('especialistas', function (Blueprint $table) {
            $table->dropForeign('especialistas_id_especialidad_foreign');
        });
    }
};
