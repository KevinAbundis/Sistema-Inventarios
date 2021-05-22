<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasCpuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_cpu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Serie_Equipo')->unique();
            $table->string('Procesador')->nullable();
            $table->string('Velocidad_Procesador')->nullable();
            $table->string('Memoria_RAM')->nullable();
            $table->string('Capacidad_DiscoDuro')->nullable();
            $table->string('Sistema_Operativo')->nullable();
            $table->string('ESET32')->nullable();
            $table->integer('Office')->nullable();
            $table->string('Service_Tag')->nullable();
            $table->string('Service_Code')->nullable();
            $table->string('IP')->nullable();
            $table->string('Usuario')->nullable();
            $table->string('Contrasenia_CPU')->nullable();
            $table->string('Remoto')->nullable();
            $table->string('Contrasenia_Remoto')->nullable();
            // $table->string('Serie_Raton')->nullable();
            // $table->string('Serie_Teclado')->nullable();
            // $table->string('Serie_Monitor')->nullable();
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
        Schema::dropIfExists('caracteristicas_cpu');
    }
}
