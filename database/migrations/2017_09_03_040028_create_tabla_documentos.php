<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('serie_id');
            $table->foreign('serie_id')->references('id')->on('series');
            $table->string('nro_documento',10);
            $table->unsignedInteger('tipo_pago_id');
            $table->foreign('tipo_pago_id')->references('id')->on('tipospagos');
            $table->unsignedInteger('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('id')->on('tiposdocumentos');
            $table->string('cNumeroOperacion',20)->default('');
            $table->decimal('igv',10,2); 
            $table->decimal('subtotal',10,2);    
            $table->decimal('total',10,2);
            $table->unsignedInteger('anio_id');
            $table->foreign('anio_id')->references('id')->on('anios');
            $table->unsignedInteger('mes_id');
            $table->foreign('mes_id')->references('id')->on('meses');
            $table->unsignedInteger('pago_dia');
            $table->date('fecha_pago');
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
        Schema::dropIfExists('documentos');
    }
}
