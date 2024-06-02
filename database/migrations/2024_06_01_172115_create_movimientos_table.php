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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->bigIncrements('MovimientoID');
            $table->unsignedBigInteger('idTrabajador');
            $table->date('FechaInicio');
            $table->date('FechaFin');
            $table->string('NroDocumento');
            $table->string('NombreDocumento');
            $table->binary('FotoDocumento');
            $table->date('FechaDocumento');
            $table->unsignedBigInteger('idCargo');
            $table->unsignedBigInteger('idArea');
            $table->unsignedBigInteger('idTipoMov');
            $table->unsignedBigInteger('idTipoDoc');
            $table->string('Estado');
            $table->timestamps();

            $table->foreign('idTrabajador')->references('idTrabajador')->on('trabajadores');
            $table->foreign('idCargo')->references('idCargo')->on('cargos');
            $table->foreign('idArea')->references('idArea')->on('areas');
            $table->foreign('idTipoMov')->references('idTipoMov')->on('tipomovimiento');
            $table->foreign('idTipoDoc')->references('idTipoDoc')->on('tipodocumento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
