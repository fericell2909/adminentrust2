<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anio;
use App\Models\Mes;
use App\Models\PersonaJuridica;
use App\Models\TipoDocumento;
use App\Models\TipoPago;
use App\Models\Serie;
use App\Models\Producto;
use App\Models\Documento;


use Illuminate\Support\Facades\Auth as Auth;

class VentaController extends Controller
{
    public function RegistrarFactura()
    {
    	$personas = PersonaJuridica::ListarPersonasJuridicasAll();

    	$tiposdocumentos = TipoDocumento::Listar_Tipo_Documento(1);
    	$tipospagos= TipoPago::Listar_Tipo_Pago();
    	$series = Serie::Listar_Series_Facturas();
    	$articulos = Producto::Listar_Productos();
    	$anios = Anio::Listar_Anios();
    	$meses = Mes::Listar_Meses();

    	return view('adminlte::venta.factura',compact('personas','tiposdocumentos','tipospagos','series','articulos','anios','meses'));


    }

    public function GuardarFactura(Request $request)
    {
    	$data = $request->all();

    	//dd($data);
    	$bresultado = Documento::GuardarFactura($data,Auth::user()->id);

    	if ($bresultado) {
    		return redirect('Venta/Factura')->with('status','Se Registro la Factura Correctamente.');
    	} else {
    		return redirect('Venta/Factura')->with('erros','La factura no ha sido registrada.');
    	}
    }
}
