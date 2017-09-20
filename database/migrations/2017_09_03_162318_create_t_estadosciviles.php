<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTEstadosciviles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creando la Tabla
        Schema::create('estadosciviles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_estado_civil',50);
            $table->unsignedInteger('estado_id')->default(1);
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->timestamps();
        });

        // Insertan Registros
        DB::table('estadosciviles')->insert([
            ['nombre_estado_civil' => 'Soltero(a)'],
            ['nombre_estado_civil' => 'Casado(a)'],
            ['nombre_estado_civil' => 'Viudo(a)'],
            ['nombre_estado_civil' => 'Divorciado(a)'],
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estadosciviles');
    }
}
