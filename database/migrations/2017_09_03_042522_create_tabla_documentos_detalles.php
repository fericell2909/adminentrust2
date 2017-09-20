<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaDocumentosDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentosdetalles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('documento_id');
            $table->foreign('documento_id')->references('id')->on('documentos');
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unsignedInteger('cantidad');
            $table->decimal('precio',10,2); 
            $table->decimal('total',10,2);
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
        Schema::dropIfExists('documentosdetalles');
    }
}
