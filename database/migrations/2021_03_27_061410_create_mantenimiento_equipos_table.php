<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Descripcion');
            $table->string('Serie_Equipo');
            $table->string('Marca')->nullable();
            $table->string('Modelo')->nullable();
            $table->string('Sucursal');
            $table->string('Departamento');
            $table->string('Ubicacion');
            $table->date('Fecha_Programada');
            $table->string('Hora_Programada');
            $table->date('Fecha_Efectiva')->nullable();
            $table->string('Hora_Efectiva')->nullable();
            $table->text('Tipo_Mantenimiento')->nullable();
            $table->text('Observaciones')->nullable();
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
        Schema::dropIfExists('mantenimiento_equipos');
    }
}
