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
        Schema::create('especialista', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('rut');
            $table->string('fecha_nacimiento');
            $table->timestamps();
            $table->unsignedInteger('id_especialidad');
            $table->foreign('id_especialidad')
                ->references('id')->on('especialidad')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialistas');
        // Schema::table('especialistas', function (Blueprint $table) {
        //     $table->dropForeign('especialistas_id_especialidad_foreign');
        // });
    }
};
