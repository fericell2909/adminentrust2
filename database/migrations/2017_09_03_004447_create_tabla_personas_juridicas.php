<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPersonasJuridicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // Creando la Tabla :personasjuridicas 
        Schema::create('personasjuridicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ruc',11);
            $table->string('RazonSocial',100);
            $table->longText('cDescripcionEmpresa',100);
            $table->unsignedInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('zonas');
            $table->unsignedInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('zonas');
            $table->unsignedInteger('distrtio_id');
            $table->foreign('distrtio_id')->references('id')->on('zonas');
            $table->string('cDireccionNegocio',100);           
            $table->double('nLatitudNegocio', 15, 8)->default(0);
            $table->double('nLongitudNegocio', 15, 8)->default(0);
            $table->string('cPaginaContacto',100);
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->timestamps();
        });

        DB::table('personasjuridicas')->insert([
                            ['Ruc' =>'10445770928',
                             'RazonSocial' =>'ESTRADA LOPEZ MARCO',
                             'cDescripcionEmpresa' => 'Empresa de Prueba',
                             'departamento_id' => '2555',
                             'provincia_id' => '7937',
                             'distrtio_id' =>  '8480',                 
                             'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                             'nLatitudNegocio' => '-9.11902388',
                             'nLongitudNegocio' => '-78.51441610',                    
                             'cPaginaContacto' => 'www.google.com.pe',
                             'persona_id' => '17'],
                            ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personasjuridicas');
    }
}
