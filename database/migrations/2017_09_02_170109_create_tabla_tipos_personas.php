<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaTiposPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Creando la Tabla :  tipospersonas

        Schema::create('tipospersonas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_tipo_persona',50);
            $table->unsignedInteger('estado_id')->default(1);
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->timestamps();
        });

        // Insertando los registros en la tabla : tipospersonas

        DB::table('tipospersonas')->insert([
                            ['descripcion_tipo_persona' =>'Persona Natural'],
                            ['descripcion_tipo_persona' =>'Persona Jurídica'],
                            ]);
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipospersonas');
    }
}
