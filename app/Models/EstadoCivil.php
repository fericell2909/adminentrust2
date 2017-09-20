<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
     protected $table='estadosciviles';
    public $primaryKey ='id';

    public static function Listar_Estados_Civiles()
    {
    	return EstadoCivil::select("estadosciviles.id as id","estadosciviles.nombre_estado_civil as nombre_estado_civil")
            				->get();
    }
}
