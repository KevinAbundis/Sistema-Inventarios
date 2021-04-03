<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas_equipos', function (Blueprint $table) {
            $table->bigIncrements('Id_Salida');
            $table->string('Nombre_Usuario');
            $table->string('Descripcion');
            $table->string('Marca')->nullable();
            $table->string('Modelo')->nullable();
            $table->string('Serie_Equipo');
            $table->string('Service_Tag')->nullable();
            $table->string('Service_Code')->nullable();
            $table->string('Sucursal_Entrega');
            $table->string('Sucursal_Recibe');
            $table->string('Departamento')->nullable();
            $table->string('Ubicacion')->nullable();
            $table->date('Fecha_Salida');
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
        Schema::dropIfExists('salidas_equipos');
    }
}
