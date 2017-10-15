<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table='role_user';
    
    public static function DevuelveCodigo_Usuario($codigo_usuario)
    {
    	$rol = RoleUser::select('role_user.role_id')
    			  ->where('role_user.user_id',$codigo_usuario)
    			  ->get();
    			  
    	return $rol[0]->role_id;
    }
}
