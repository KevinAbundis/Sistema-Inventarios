<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Serie_Equipo')->unique();
            $table->string('Sucursal');
            $table->string('Departamento');
            $table->string('Ubicacion')->nullable();
            $table->string('Tipo_Hardware');
            $table->string('Marca')->nullable();
            $table->string('Modelo')->nullable();
            $table->text('Descripcion')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('equipos');
    }
}
