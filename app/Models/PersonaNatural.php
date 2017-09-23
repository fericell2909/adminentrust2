<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Persona;

class PersonaNatural extends Model
{
    protected $table='personasnaturales';
    public $primaryKey ='id';

    public static function GuardarPersonaNatural($data)
    {
    	// Insertando en la tabla: personas:

    	$codigo_persona_generado = DB::table('personas')->insertGetId(
     			[
     				'tipo_persona_id' => 1,
     				'estado_id' => 1, 
		 			'created_at' =>  date_create()->format('Y-m-d H:i:s'),
		 			'updated_at' =>  date_create()->format('Y-m-d H:i:s')				
     			]
		 	);

    	// Insertando en la tabla

    	$persona_natural = new PersonaNatural();

    	$persona_natural->Nombres = $data['Nombres'];
		$persona_natural->cApellidoPaterno = $data['cApellidoPaterno'];
		$persona_natural->cApellidoMaterno = $data['cApellidoMaterno'];
		$persona_natural->cCorreoElectronico = $data['cCorreoElectronico'];
		$persona_natural->cCelular = $data['cCelular'];
		$persona_natural->cTelefonoFijo = $data['cTelefonoFijo'];
		$persona_natural->sexo_id = $data['sexo_id'];
		$persona_natural->estado_civil_id = $data['estado_civil_id'];
		$persona_natural->departamento_id = $data['departamento_id'];
		$persona_natural->provincia_id = $data['provincia_id'];
		$persona_natural->distrtio_id = $data['distrito_id'];
		$persona_natural->cDireccionNegocio = $data['cDireccionNegocio'];
		$persona_natural->nLatitudNegocio = $data['nLatitudNegocio'];
		$persona_natural->nLongitudNegocio = $data['nLongitudNegocio'];
		$persona_natural->cPaginaContacto = $data['cPaginaContacto'];
		$persona_natural->persona_id = $codigo_persona_generado;
		$persona_natural->created_at = date_create()->format('Y-m-d H:i:s');
		$persona_natural->updated_at = date_create()->format('Y-m-d H:i:s');
		$persona_natural->dni = $data['dni'];
		$persona_natural->save();

		return true;
    }

    public static function GuardarPersonaNatural2($data)
    {
    	 try
         {
            DB::beginTransaction();

            	$codigo_persona_generado = DB::table('personas')->insertGetId(
	     			[
	     				'tipo_persona_id' => 1,
	     				'estado_id' => 1, 
			 			'created_at' =>  date_create()->format('Y-m-d H:i:s'),
			 			'updated_at' =>  date_create()->format('Y-m-d H:i:s')				
	     			]
		 		);

		    	// Insertando en la tabla

		    	$persona_natural = new PersonaNatural();

		    	$persona_natural->Nombres = $data['Nombres'];
				$persona_natural->cApellidoPaterno = $data['cApellidoPaterno'];
				$persona_natural->cApellidoMaterno = $data['cApellidoMaterno'];
				$persona_natural->cCorreoElectronico = $data['cCorreoElectronico'];
				$persona_natural->cCelular = $data['cCelular'];
				$persona_natural->cTelefonoFijo = $data['cTelefonoFijo'];
				$persona_natural->sexo_id = $data['sexo_id'];
				$persona_natural->estado_civil_id = $data['estado_civil_id'];
				$persona_natural->departamento_id = $data['departamento_id'];
				$persona_natural->provincia_id = $data['provincia_id'];
				$persona_natural->distrtio_id = $data['distrito_id'];
				$persona_natural->cDireccionNegocio = $data['cDireccionNegocio'];
				$persona_natural->nLatitudNegocio = $data['nLatitudNegocio'];
				$persona_natural->nLongitudNegocio = $data['nLongitudNegocio'];
				$persona_natural->cPaginaContacto = $data['cPaginaContacto'];
				$persona_natural->persona_id = $codigo_persona_generado;
				$persona_natural->created_at = date_create()->format('Y-m-d H:i:s');
				$persona_natural->updated_at = date_create()->format('Y-m-d H:i:s');
				$persona_natural->dni = $data['dni'];
				$persona_natural->save();

          	DB::commit();

          	return true;  

         } catch(Exception $e)
         {
            DB::rollback();

            return false; 

    	 }
    }

    public static function Listar()
    {

    	return PersonaNatural::select("personasnaturales.id",
    								   "personasnaturales.dni",
    								   "personasnaturales.cCorreoElectronico",
    								   "personasnaturales.cApellidoPaterno",
    								   "personasnaturales.cApellidoMaterno",
    								   "personasnaturales.Nombres",
    								   "estados.nombre_estado",
    								   "personasnaturales.persona_id")
    						    ->join("personas","personas.id","=","personasnaturales.persona_id")
    						    ->join("estados","estados.id","=","personas.estado_id")
	                            ->orderBy('personasnaturales.id','DESC')
	                            ->paginate(4); 
    }

    public static function Listar_Persona_Natural($id)
    {
    	return PersonaNatural::select("personasnaturales.id",
    								   "personasnaturales.Nombres",
    								   "personasnaturales.cApellidoPaterno",
    								   "personasnaturales.cApellidoMaterno",
    								   "personasnaturales.cCorreoElectronico",
    								   "personasnaturales.cCelular",
    								   "personasnaturales.cTelefonoFijo",
    								   "sexos.nombre_sexo",
    								   "estadosciviles.nombre_estado_civil",
    								   "z1.cNomZona as nombre_departamento",
    								   "z2.cNomZona as nombre_provincia",
    								   "z3.cNomZona as nombre_distrito",
    								   "personasnaturales.cDireccionNegocio",
									   "personasnaturales.nLatitudNegocio",
									   "personasnaturales.nLongitudNegocio",
									   "personasnaturales.cPaginaContacto",
    								   "estados.nombre_estado",
    								   "personasnaturales.persona_id",
    								   "personasnaturales.dni"	   
    								  )
    						    ->join("personas","personas.id","=","personasnaturales.persona_id")
    						    ->join("estados","estados.id","=","personas.estado_id")
    						    ->join("zonas as z1","z1.id","=","personasnaturales.departamento_id")
    						    ->join("zonas as z2","z2.id","=","personasnaturales.provincia_id")
    						    ->join("zonas as z3","z3.id","=","personasnaturales.distrtio_id")
    						    ->join("sexos","sexos.id","=","personasnaturales.sexo_id")
    						    ->join("estadosciviles","estadosciviles.id","=","personasnaturales.estado_civil_id")
    						    ->where("personasnaturales.id",$id)
    						    ->get();
    }
}	
