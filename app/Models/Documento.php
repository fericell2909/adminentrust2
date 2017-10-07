<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\Serie;
use App\Models\DocumentoDetalle;
use App\Models\Producto;

class Documento extends Model
{
    protected $table='documentos';
    public $primaryKey ='id';
    public static function GuardarFactura($datos,$codigo_usuario)
    {
    	try {
    		
            DB::beginTransaction();
    			
    			Serie::ActualizarCorrelativo($datos['serie_id']);
            	
            	$numero_documento = Serie::DevuelveCorrelativo($datos['serie_id']);

            	$igv = 0;
            	$subtotal =0;
            	$total = 0;


            	// Insertando Cabecera
            	$codigo_documento_generado = DB::table('documentos')->insertGetId(
		     			[
		     				'persona_id' => $datos['persona_id'],
		     				'user_id'  => $codigo_usuario,
							'serie_id' => $datos['serie_id'],
							'nro_documento' => $numero_documento,
							'tipo_pago_id' => $datos['serie_id'],
							'tipo_documento_id' => $datos['serie_id'],
							'cNumeroOperacion' => '',
							'igv'  => $igv,
							'subtotal' => $subtotal,
							'total' => $total,
							'anio_id' => $datos['anio_id'], 
							'mes_id' => $datos['mes_id'],
							'pago_dia' => $datos['pago_dia'],
							'fecha_pago' => date_create($datos['anio_id'] . "/" . $datos['mes_id'] . "/" .$datos['pago_dia'])->format('Y-m-d H:i:s'),
				 			'created_at' =>  date_create()->format('Y-m-d H:i:s'),
				 			'updated_at' =>  date_create()->format('Y-m-d H:i:s')				
		     			]
				 	);

            	// Insertando Detalle.
            	  for ($i=0; $i < count($datos['idarticulo']); $i++) { 
                    
                   $precio = $datos['precio_venta'][$i];
				   $cantidad = $datos['cantidad'][$i];                   
				   $articulo = $datos['idarticulo'][$i];

                   $subtotal = floatval($datos['precio_venta'][$i])*intval($datos['cantidad'][$i]);

               		$documento_detalle = new DocumentoDetalle();

               		$documento_detalle->documento_id = $codigo_documento_generado;
               		$documento_detalle->producto_id = $articulo;
               		$documento_detalle->cantidad = $cantidad;
               		$documento_detalle->precio = $precio;
               		$documento_detalle->total = $subtotal;

               		$documento_detalle->save();

               		Producto::ActualizarStockProducto($datos['idarticulo'][$i],$cantidad);

               		$total = $total + $subtotal;
                    
                    
               }

               $igv = 0.18*$total;

               $totaligv = $total + $igv;

               // Actualizando los Datos.

                $valores=array('igv'=> $igv,
                			   'subtotal' =>$total,
                			   'total' => $totaligv );

            	Documento::where('id',$codigo_documento_generado)
                	->update($valores);

                $valores= null;
                $igv = null;
                $totaligv = null; 
                $total =null;

            DB::commit();

          	return true;  
    	} catch (Exception $e) {
    		B::rollback();

            return false; 
    	}
    }
}
