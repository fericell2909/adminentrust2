<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
     protected $table='tiposdocumentos';
    public $primaryKey ='id';

    public static function Listar_Tipo_Documento($id)
    {
    	return TipoDocumento::select(
    		                        "tiposdocumentos.id as tipo_documento_id",
    								 "tiposdocumentos.descripcion_tipo_documento"
    								)
    							->where("tiposdocumentos.id",$id)
    							->get();

    }

}
