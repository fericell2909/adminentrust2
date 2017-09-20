<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estados';
    public $primaryKey ='id';
    
    public static function Listar_Estados()
    {
    	return Estado::select("estados.id as id","estados.nombre_estado as nombre_estado")->get();
    }
}
