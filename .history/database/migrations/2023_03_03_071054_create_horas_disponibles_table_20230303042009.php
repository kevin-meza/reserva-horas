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
        Schema::create('horas_disponibles', function (Blueprint $table) {
            $table->increments('id_fecha');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('id_especialista');
            $table->integer('id_estado')->default(1);

            $table->timestamps();

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
