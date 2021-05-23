<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacion_equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Descripcion');
            $table->string('Serie_Equipo');
            $table->string('Service_Tag')->nullable();
            $table->string('Service_Code')->nullable();
            $table->string('Marca')->nullable();
            $table->string('Modelo')->nullable();
            $table->string('Sucursal');
            $table->string('Departamento');
            $table->string('Ubicacion');
            $table->date('Fecha_Salida');
            $table->string('Firma_Salida');
            $table->string('Motivo_Salida');
            $table->string('Lugar_Salida');
            $table->date('Fecha_Entrega')->nullable();
            $table->string('Firma_Entrega')->nullable();
            $table->string('Estado_Entrega')->nullable();
            $table->date('Fecha_Entrega_Usuario')->nullable();
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
        Schema::dropIfExists('reparacion_equipos');
    }
}
