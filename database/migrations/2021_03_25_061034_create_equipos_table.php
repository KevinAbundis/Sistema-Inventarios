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
            $table->string('Serie_Equipo')->primary();
            $table->integer('Id_Sucursal');
            $table->integer('Id_Departamento');
            $table->integer('Id_Ubicacion');
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
