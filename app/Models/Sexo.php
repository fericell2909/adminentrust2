<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table='sexos';
    public $primaryKey ='id';
    
    public static function Listar_Sexo()
    {
    	return Sexo::select("sexos.id as id","sexos.nombre_sexo as nombre_sexo")
    				 ->where("sexos.estado_id",1)
            			->get();
    }
}
