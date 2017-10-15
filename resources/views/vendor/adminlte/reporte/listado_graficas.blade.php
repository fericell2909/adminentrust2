@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Reportes Graficos
@endsection

@section('css')
<style>
	.color-azul {
	    color: #337ab7;
	}
	.content-wrapper
		{
    		background-color: #ffffff;
		}
	.fa-bar-chart
		{
			color: #00a65a;
		}
	.form-control
		{
			border-radius:4px;
		}
	.panel-primary 
		{
    		border-color: #00a65a;
		}

</style>
@endsection

@section('script-inicio')
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 class="text-center color-azul"><strong><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp; Reportes Graficos del Sistema&nbsp;<i class="fa fa-bar-chart" aria-hidden="true"></i></strong></h3>  
				
				<div  class="row" >
					<div class="col-md-6">
					                  <label class="color-azul">Año</label>
					                  <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">

					                  @foreach($anios as $anio)
					                  	<option value="{{$anio->id}}" >{{$anio->numero_anio}}</option>
					                  @endforeach
									</select>					                  

					</div>


					<div class="col-md-6">
					                  <label class="color-azul">Mes</label>
					                  <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
					                  @foreach($meses as $mes)
					                  	<option value="{{$mes->id}}" >{{$mes->nombre_mes}}</option>
					                  @endforeach
					                  </select>

					</div>
					</div>

					<div  class="row" >
					<br/>
						<div class="box box-primary">
							<div class="box-header">
							</div>

							<div class="box-body" id="div_grafica_barras">
							</div>

						    <div class="box-footer">
							</div>
						</div>



							<br/>
						<div class="box box-primary">
							<div class="box-header">
							</div>

							<div class="box-body" id="div_grafica_lineas">
							</div>

						    <div class="box-footer">
							</div>
						</div>

					</div>

				



			</div>
		</div>
	</div>		
@endsection

@section('script-fin')
	<script type="text/javascript" src="/js/highcharts.js"></script>
	<script type="text/javascript" src="/js/graficas.js"></script>

@endsection