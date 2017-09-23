<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sexo;
use App\Models\EstadoCivil;
use App\Models\Zona;
use App\Models\PersonaNatural;

class PersonaController extends Controller
{

    public function RegistrarPersonaNatural()
    {
    	$sexos = Sexo::Listar_Sexo();
    	$estadosciviles = EstadoCivil::Listar_Estados_Civiles();
    	$departamentos  = Zona::Listar_zonas_departamentos(); 

    	return view('adminlte::persona.personanatural',compact('sexos','estadosciviles','departamentos'));
    
    }
    public function GuardarPersonaNatural(Request $request)
    {

        $data =$request->all();
        //$bresultado = PersonaNatural::GuardarPersonaNatural($data);
        // uso de Transacciones de Ejemplo..
        
        $bresultado = PersonaNatural::GuardarPersonaNatural2($data);

        if ($bresultado) {
            // Exito
            return redirect()->back()->with('status','Los Datos han sido guardados exitosamente');
            //echo "Grabacion Correcta";
        } else {
                
            //echo "Grabacion no realizada";    
            return redirect()->back()->with('errors','Los Datos no han sido guardados correctamente.');

        }
        
    }
    public function crud(request $request )
    {

        // Listar Todas las Personas Naturales...

        if ($request->ajax()) {
            $personasnataurales = PersonaNatural::Listar();
            return view('adminlte::persona.personanaturaltable',compact('personasnataurales'));    
        } else {
           $personasnataurales = PersonaNatural::Listar();
            //$personasnataurales = null;
            return view('adminlte::persona.personacrud',compact('personasnataurales'));
        }
    }

    public function VerPersonaNatural($id)
    {
        //$id : codigo de persona natural.
        //echo $id;
        $personasnataurales = PersonaNatural::Listar_Persona_Natural($id);

        //dd($personasnataurales);
        
        return view('adminlte::persona.verpersonanatural',compact('personasnataurales'));
    }

    public function EditarPersonaNatural($id)
    {
        //...
    }
}
