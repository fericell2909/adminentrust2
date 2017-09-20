<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaSexos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear Tabla sexos
        Schema::create('sexos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_sexo',50);
            $table->unsignedInteger('estado_id')->default(1);
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->timestamps();
        });

        // Insertando la Tabla de sexos:
          DB::table('sexos')->insert([
            ['nombre_sexo' => 'Hombre'],
            ['nombre_sexo' => 'Mujer'],
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sexos');
    }
}
