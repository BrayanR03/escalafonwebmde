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
        Schema::create('estudios', function (Blueprint $table) {
            $table->bigIncrements('idEstudios');
            $table->string('Descripcion');
            $table->unsignedBigInteger('idNivelEstudios');
            $table->unsignedBigInteger('idInstitucion');
            $table->unsignedBigInteger('idTrabajador');
            $table->timestamps();

            $table->foreign('idNivelEstudios')->references('idNivelEstudios')->on('nivelestudios');
            $table->foreign('idInstitucion')->references('idInstitucion')->on('institucion');
            $table->foreign('idTrabajador')->references('idTrabajador')->on('trabajadores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudios');
    }
};
