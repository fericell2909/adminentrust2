<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth as Auth;

use App\Models\Reporte;
use App\User;
use PDF;

class PDFController extends Controller
{
      public function reportes()
    {
    	$reportes = Reporte::Listado_Reportes_X_Rol(Auth::user()->id);
        return view("adminlte::reporte.reporte",compact('reportes'));
    }

    public function crear_reporte_usuarios($tipo)
    {
    	$vistaurl="adminlte::reporte.reporte_usuarios";
        $usuarios=User::all();
     
     return $this->CrearUsuarioPDF($usuarios, $vistaurl,$tipo);

    }

    private function CrearUsuarioPDF($datos,$vistaurl,$tipo)
    {

        $data = $datos;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte_usuarios.pdf'); }
    }

}
