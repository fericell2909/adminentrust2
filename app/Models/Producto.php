<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='productos';
    public $primaryKey ='id';
    public static function Listar_Productos()
    {
    	return Producto::select("productos.id as idarticulo",
    						   "productos.precio as precio",
    						   "productos.stock as stock",
    						   "productos.cDescripcionProducto as cDescripcionProducto")
    					->get();
    }

     public static Function ActualizarStockProducto($id,$stock)
    {
        $cantidad = Producto::select("productos.stock")
                      ->where("productos.id",$id)
                      ->get();


         $valores=array('stock'=>intval($cantidad[0]->stock) - $stock );

            Producto::where('id',$id)
                ->update($valores);

            $valores = null;
            $cantidad = null;
      
    }
}
