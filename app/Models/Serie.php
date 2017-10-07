<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table='series';
    public $primaryKey ='id';

    public static function Listar_Series_Facturas()
    {
    	return Serie::select("series.id as serie_id","series.cDenominacionSerie")
    				  ->where("series.tipo_documento_id",1)
    				  ->get();
    }

    public static Function ActualizarCorrelativo($id)
    {
    	$cantidad = Serie::select("series.nCorrelativo")
    				  ->where("series.id",$id)
    				  ->get();


    	 $valores=array('nCorrelativo'=>intval($cantidad[0]->nCorrelativo) + 1 );

            Serie::where('id',$id)
                ->update($valores);

            $valores = null;
            $cantidad = null;
      
    }

    public static function DevuelveCorrelativo($id)
    {
    	$correlativo = Serie::select("series.nCorrelativo")
    				  ->where("series.id",$id)
    				  ->get();

    	return $correlativo[0]->nCorrelativo;
    
    }

}
