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
        Schema::create('experiencialaboral', function (Blueprint $table) {
            $table->bigIncrements('idExperiencia');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->unsignedBigInteger('idCargo');
            $table->unsignedBigInteger('idTrabajador');
            $table->unsignedBigInteger('idInstitucion');

            $table->timestamps();

            $table->foreign('idCargo')->references('idCargo')->on('cargos');
            $table->foreign('idTrabajador')->references('idTrabajador')->on('trabajadores');
            $table->foreign('idInstitucion')->references('idInstitucion')->on('institucion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencialaboral');
    }
};
