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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->bigIncrements('idTrabajador');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->string('Nombres');
            $table->string('Dni',8);
            $table->string('Sexo',1);
            $table->date('FechaNacimiento');
            $table->unsignedBigInteger('idCondicionLaboral');
            $table->timestamps();


            $table->foreign('idCondicionLaboral')->references('idCondicionLaboral')->on('condicionlaboral');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores');
    }
};
