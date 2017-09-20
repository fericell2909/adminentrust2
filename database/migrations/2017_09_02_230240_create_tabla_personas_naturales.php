<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaPersonasNaturales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personasnaturales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombres',50); 
            $table->string('cApellidoPaterno',50);    
            $table->string('cApellidoMaterno',50); 
            $table->string('cCorreoElectronico',100);  
            $table->integer('cCelular');    
            $table->string('cTelefonoFijo',50);   
            $table->unsignedInteger('sexo_id');
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->unsignedInteger('estado_civil_id');
            $table->foreign('estado_civil_id')->references('id')->on('estadosciviles');      
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

        // Insertando los Registros.

            DB::table('personasnaturales')->insert([
                                        [   'Nombres' => 'Cristian Alexander', 
                                            'cApellidoPaterno' =>'Ycochea',     
                                            'cApellidoMaterno' => 'Carhuajulca', 
                                            'cCorreoElectronico' => 'crisycochea@gmail.com',
                                            'cCelular' => '934131688',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '1'
                                        ],
                                        [   'Nombres' => 'José Luis', 
                                            'cApellidoPaterno' =>'Panta',     
                                            'cApellidoMaterno' => 'Acosta', 
                                            'cCorreoElectronico' => 'josepanta63@gmail.com',
                                            'cCelular' => '943195262',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '2'
                                        ],
                                        [   'Nombres' => 'Josué Abraham', 
                                            'cApellidoPaterno' =>'Valverde',     
                                            'cApellidoMaterno' => 'Solis', 
                                            'cCorreoElectronico' => 'abrahamvalverde97@gmail.com',
                                            'cCelular' => '925047562',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '3'
                                        ],
                                        [   'Nombres' => 'Karla Alessandra', 
                                            'cApellidoPaterno' =>'Gomero',     
                                            'cApellidoMaterno' => 'Salinas', 
                                            'cCorreoElectronico' => 'karlaalessandragomerosalinas@gmail.com',
                                            'cCelular' => '950500410',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '2',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '4'
                                        ],
                                        [   'Nombres' => 'Vanessa Gabriela', 
                                            'cApellidoPaterno' =>'Chamache',     
                                            'cApellidoMaterno' => 'Pereda', 
                                            'cCorreoElectronico' => 'vanesachamache@gmail.com',
                                            'cCelular' => '988909330',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '2',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '5'
                                        ],
                                        [   'Nombres' => 'Luis Angel', 
                                            'cApellidoPaterno' =>'Manco',     
                                            'cApellidoMaterno' => 'Vilcherres', 
                                            'cCorreoElectronico' => 'luisangelmanco1809@gmail.com',
                                            'cCelular' => '967996411',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '6'
                                        ],
                                        [   'Nombres' => 'Ruby', 
                                            'cApellidoPaterno' =>'Campos',     
                                            'cApellidoMaterno' => 'Vasquez', 
                                            'cCorreoElectronico' => 'leo_amor_14@hotmail.com',
                                            'cCelular' => '942191817',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '2',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '7'
                                        ],
                                        [   'Nombres' => 'Elmer Luis', 
                                            'cApellidoPaterno' =>'Rodriguez',     
                                            'cApellidoMaterno' => 'Bobadilla', 
                                            'cCorreoElectronico' => 'elrodriguez2423@gmail.com',
                                            'cCelular' => '921008708',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '8'
                                        ],
                                        [   'Nombres' => 'Mabel Stefany', 
                                            'cApellidoPaterno' =>'Cruz',     
                                            'cApellidoMaterno' => 'Cadillo', 
                                            'cCorreoElectronico' => 'mabelcruuz@hotmail.com',
                                            'cCelular' => '939747458',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '2',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '9'
                                        ],
                                        [   'Nombres' => 'Edison Gabriel', 
                                            'cApellidoPaterno' =>'Lecca',     
                                            'cApellidoMaterno' => 'Reyna', 
                                            'cCorreoElectronico' => 'edlecca31@gmail.com',
                                            'cCelular' => '922020063',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '10'
                                        ],
                                        [   'Nombres' => 'Franciso', 
                                            'cApellidoPaterno' =>'Lopez',     
                                            'cApellidoMaterno' => 'Zapata', 
                                            'cCorreoElectronico' => 'francistho1997@gmail.com',
                                            'cCelular' => '979289208',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '11'
                                        ],
                                        [   'Nombres' => 'Juan Roberto', 
                                            'cApellidoPaterno' =>'Rodríguez',     
                                            'cApellidoMaterno' => 'Torres', 
                                            'cCorreoElectronico' => 'juanrodrigueztorres@outlook.es',
                                            'cCelular' => '948833129',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '12'
                                        ],
                                        [   'Nombres' => 'Luis Manuel', 
                                            'cApellidoPaterno' =>'Melendez',     
                                            'cApellidoMaterno' => 'Rodriguez', 
                                            'cCorreoElectronico' => 'pekelumerito@gmail.com',
                                            'cCelular' => '922438832',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '13'
                                        ],
                                        [   'Nombres' => 'Anthony Fernando Dilan', 
                                            'cApellidoPaterno' =>'Merchán',     
                                            'cApellidoMaterno' => 'Quispe', 
                                            'cCorreoElectronico' => 'Dilangamer.132@gmail.com',
                                            'cCelular' => '954853939',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '14'
                                        ],
                                        [   'Nombres' => 'Mario Augusto', 
                                            'cApellidoPaterno' =>'Merchán',     
                                            'cApellidoMaterno' => 'Gordillo', 
                                            'cCorreoElectronico' => 'mmerchan_7@hotmail.com',
                                            'cCelular' => '943749632',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '15'
                                        ],
                                        [   'Nombres' => 'Anghelo', 
                                            'cApellidoPaterno' =>'Rodriguez',     
                                            'cApellidoMaterno' => 'Gil', 
                                            'cCorreoElectronico' => 'sumblech17@outlook.es',
                                            'cCelular' => '921910912',    
                                            'cTelefonoFijo' => '043313333',   
                                            'sexo_id' => '1',
                                            'estado_civil_id' => '1',      
                                            'departamento_id' => '2555',
                                            'provincia_id' => '7937',
                                            'distrtio_id' =>  '8480',                 
                                            'cDireccionNegocio' => 'Urb. Bellamar S/N 500',
                                            'nLatitudNegocio' => '-9.11902388',
                                            'nLongitudNegocio' => '-78.51441610',                    
                                            'cPaginaContacto' => 'www.google.com.pe',
                                            'persona_id' => '15'
                                        ],

                                        ]);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personasnaturales');
    }
}
