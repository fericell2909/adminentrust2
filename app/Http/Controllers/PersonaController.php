<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sexo;
use App\Models\EstadoCivil;
use App\Models\Zona;
use App\Models\PersonaNatural;
use App\Models\Estado;

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

    public function CrudBootGrid()
    {

        return view('adminlte::persona.personacrudbootgrid');

    }

    public function BootGrid(Request $request)
    {

        $datos = $request->all();

        return PersonaNatural::ListarBootGrid($datos);
        //dd($datos);
       

    }

    public function VerPersonaNatural($id)
    {
        //$id : codigo de persona natural.
        //echo $id;
        $personasnataurales = PersonaNatural::Listar_Persona_Natural($id);

        //dd($personasnataurales);
        
        return view('adminlte::persona.verpersonanatural',compact('personasnataurales'));
    }

    public function VerBootGridPersonaNatural($id)
    {
        //$id : codigo de persona natural.
        //echo $id;
        $personasnataurales = PersonaNatural::Listar_Persona_Natural($id);

        //dd($personasnataurales);
        
        return view('adminlte::persona.verpersonanatural',compact('personasnataurales'));
    }

    public function EditarPersonaNatural($id)
    {
        $sexos = Sexo::Listar_Sexo();
        $estadosciviles = EstadoCivil::Listar_Estados_Civiles();
        $departamentos  = Zona::Listar_zonas_departamentos();
        $personasnataurales = PersonaNatural::Listar_Persona_Natural($id);
        $provincias = Zona::Listar_zonas_provincias_x_departamento($personasnataurales[0]->departamento_id);
        $distritos = Zona::Listar_zonas_distritos_x_provincia($personasnataurales[0]->provincia_id); 
        //dd($provincias);
        $estados = Estado::Listar_Estados();
        
        return view('adminlte::persona.editarpersonanatural',compact('sexos','estadosciviles','departamentos','personasnataurales','provincias','distritos','estados'));

    }

    public function EditarBootGridPersonaNatural($id)
    {
        $sexos = Sexo::Listar_Sexo();
        $estadosciviles = EstadoCivil::Listar_Estados_Civiles();
        $departamentos  = Zona::Listar_zonas_departamentos();
        $personasnataurales = PersonaNatural::Listar_Persona_Natural($id);
        $provincias = Zona::Listar_zonas_provincias_x_departamento($personasnataurales[0]->departamento_id);
        $distritos = Zona::Listar_zonas_distritos_x_provincia($personasnataurales[0]->provincia_id); 
        //dd($provincias);
        $estados = Estado::Listar_Estados();
        
        return view('adminlte::persona.editarbootgridpersonanatural',compact('sexos','estadosciviles','departamentos','personasnataurales','provincias','distritos','estados'));

    }
    public function EditarBootGridGuardarPersonaNatural(request $request)
    {

        $data= $request->all();

        // var_dump($data);

        $bresultado = PersonaNatural::EditarPersonaNatural($data);

        if ($bresultado) {
            
            return redirect('PersonaNatural/CrudBootGrid')->with('status','Los Datos se actualizaron correctamente.');

        } else {
            
            return redirect('PersonaNatural/CrudBootGrid')->with('errors','La Datos No se actualizaron correctamente.');

        }
        
    }
    
    public function EditarGuardarPersonaNatural(request $request)
    {

        $data= $request->all();

        // var_dump($data);

        $bresultado = PersonaNatural::EditarPersonaNatural($data);

        if ($bresultado) {
            
            return redirect('PersonaNatural/Crud')->with('status','Los Datos se actualizaron correctamente.');

        } else {
            
            return redirect('PersonaNatural/Crud')->with('errors','La Datos No se actualizaron correctamente.');

        }
        
    }
}
