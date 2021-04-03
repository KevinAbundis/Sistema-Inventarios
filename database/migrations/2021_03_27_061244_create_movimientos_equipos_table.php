<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_equipos', function (Blueprint $table) {
            $table->bigIncrements('Id_Movimiento');
            $table->string('Nombre_Usuario');
            $table->string('Serie_Equipo');
            $table->string('Operacion_Realizada');
            $table->date('Fecha_Operacion');
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
        Schema::dropIfExists('movimientos_equipos');
    }
}
