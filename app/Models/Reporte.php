<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoleUser;
class Reporte extends Model
{
        protected $table='reportes';
    public $primaryKey ='id';

    public static function Listado_Reportes_X_Rol($codigo_usuario)
    {
    	$role_id = RoleUser::DevuelveCodigo_Usuario($codigo_usuario);

    	return Reporte::select('reportes.nombre_reporte','reportes.link')
    					->where('reportes.role_id',$role_id)
    					->where('reportes.estado_id',1)
    					->get();
    }
}

