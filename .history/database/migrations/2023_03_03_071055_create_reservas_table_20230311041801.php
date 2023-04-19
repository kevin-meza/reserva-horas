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
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id_reserva');
            $table->unsignedInteger('id_fecha');
            $table->unsignedInteger('id_persona');
            $table->unsignedInteger('id_especialidad');
            $table->unsignedInteger('id_especialista');
            // $table->integer('id_estado')->default(1);

            $table->timestamps();

            $table->foreign('id_fecha')
            ->references('id_fecha')->on('horas_disponibles')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_persona')
                ->references('id')->on('personas')
                ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('id_especialidad')
                ->references('id')->on('especialidades')
                ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('id_especialista')
                ->references('id_especialista')->on('especialistas')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horas_disponibles');
    }
};
