<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('tipo_persona_id')->default(1);
            $table->foreign('tipo_persona_id')->references('id')->on('tipospersonas');

            $table->unsignedInteger('estado_id')->default(1);
            $table->foreign('estado_id')->references('id')->on('estados');

            $table->timestamps();
        });

        // Insertando en la Tabla personas:

        DB::table('personas')->insert([
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'1', 'estado_id' => 1],
                                      ['tipo_persona_id' =>'2', 'estado_id' => 1],
                                      ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
