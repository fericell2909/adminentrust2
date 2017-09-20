<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaAnios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creando la Tabla anios
        Schema::create('anios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_anio');
            $table->timestamps();
        });

        // Insertando Registros en la Tabla Anios
        DB::table('anios')->insert([
                                ['numero_anio' => '2017'],
                                ['numero_anio' => '2018'],
                               ]);

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anios');
    }
}
