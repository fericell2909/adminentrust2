<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaMeses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creando la Tabla meses
        Schema::create('meses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_mes',50);
            $table->timestamps();
        });

        // Insertando Registros en la tabla : meses
        DB::table('meses')->insert([
                                ['nombre_mes' => 'Enero'],
                                ['nombre_mes' => 'Febrero'],
                                ['nombre_mes' => 'Mazo'],
                                ['nombre_mes' => 'Abril'],
                                ['nombre_mes' => 'Mayo'],
                                ['nombre_mes' => 'Junio'],
                                ['nombre_mes' => 'Julio'],
                                ['nombre_mes' => 'Agosto'],
                                ['nombre_mes' => 'Setiembre'],
                                ['nombre_mes' => 'Octubre'],
                                ['nombre_mes' => 'Noviembre'],
                                ['nombre_mes' => 'Diciembre'],
                               ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meses');
    }
}
