@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Ver Persona Natural
@endsection

@section('css')
	<style>
		.content-wrapper
			{
    			background-color: #ffffff;
			}
		.color-azul
			{
				color: #337ab7;
			}
		.fa-pencil-square
			{
				color: #00a65a;
			}
		.form-control
			{
				border-radius:4px;
			}
		.form-control[readonly]{
		    background-color: #ffffff;
		    opacity: 1;
		    }
		#map_canvas
	  	{
	    	width:600px; 
	    	height:400px;
	    	border: 1px solid #337ab7 !important;
	  	}
		.help-block
		{
	  	    color: red;
		}
	 @media(max-width: 768px) 
	 	{
			#map_canvas
		  	{
		    	width:320px;
		  	}

		}
	</style>
@endsection

@section('script-inicio')
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
        		<h3 class="text-center color-azul"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Ver Persona Natural&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></strong></h3>  
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
	                                    <div class="form-group row">
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Nombres:</label>
	                                          <input type="text" class="form-control text-center"  id="Nombres" name="Nombres"   placeholder="Nombres" readonly maxlength="20" value="{{ $personasnataurales[0]->Nombres}}">
	                                        </div>
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Apellido Paterno:</label>
	                                          <input type="text" class="form-control text-center"  id="cApellidoPaterno" name="cApellidoPaterno" placeholder="Apellido Paterno" maxlength="40" readonly value="{{ $personasnataurales[0]->cApellidoPaterno}}">
	                                        </div>
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Apellido Materno:</label>
	                                          <input type="text" class="form-control text-center"  id="cApellidoMaterno" name="cApellidoMaterno" readonly placeholder="Apellido Materno" maxlength="40"
	                                          value="{{ $personasnataurales[0]->cApellidoMaterno}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Sexo:</label>
	                                        <select class="form-control text-center" name="sexo_id" id="sexo_id" readonly>
				                                    <option selected >{{ $personasnataurales[0]->nombre_sexo}}</option>
	                            			</select>
	                                        <span  id ="ErrorMensaje-sexo_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Estado Civil:</label>
	                                        <select class="form-control text-center" name="estado_civil_id" id="estado_civil_id" readonly>
				                                    <option>{{ $personasnataurales[0]->nombre_estado_civil}}</option>
	                            			</select>
	                                        <span  id ="ErrorMensaje-estado_civil_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                          <label class="color-azul">Dni:</label>
	                                          <input type="text" class="form-control text-center"  id="dni" name="dni"  required placeholder="Dni" maxlength="8" readonly value="{{ $personasnataurales[0]->dni}}" >
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Telefono:</label>
	                                        <input type="text" class="form-control text-center"  id="cTelefonoFijo" name="cTelefonoFijo"  required placeholder="043325090" value={{ $personasnataurales[0]->cTelefonoFijo}}>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Celular:</label>
	                                        <input type="text" class="form-control text-center"  id="cCelular" name="cCelular"  required placeholder="Celular" maxlength="9" value="{{ $personasnataurales[0]->cCelular}}">
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Correo Electrónico</label>
	                                        <input type="text" class="form-control text-center"  id="cCorreoElectronico" name="cCorreoElectronico"  placeholder="ejemplo@ejemplo.com" value="{{ $personasnataurales[0]->cCorreoElectronico}}" readonly>
	                                      </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Departamento:</label>
	                                        <select class="form-control text-center" name="departamento_id" id="departamento_id" readonly>
				                                <option>{{ $personasnataurales[0]->nombre_departamento}}</option>
				                           	</select>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Provincia:</label>
											<select class="form-control text-center" name="provincia_id" id="provincia_id" readonly>
												<option>{{ $personasnataurales[0]->nombre_provincia}}</option>
											</select>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Distrito:</label>
											<select class="form-control text-center" name="distrito_id" id="distrito_id">
												<option>{{ $personasnataurales[0]->nombre_distrito}}</option>
											</select>
	                                      </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-6">
	                                        <label class="color-azul">Dirección de Negocio:</label>
	                                        <input type="text" class="form-control text-center" 
	                                        id="cDireccionNegocio" name="cDireccionNegocio"  required placeholder="Dirección de Negocio" readonly value="{{ $personasnataurales[0]->cDireccionNegocio}}">
	                                        
	                                      </div>
	                                      <div class="col-sm-6">
	                                        <label class="color-azul">Pagina de Contacto:</label>
	                                        <input type="text" class="form-control text-center"  id="cPaginaContacto" name="cPaginaContacto"  placeholder="www.ejemplo.com" readonly value="{{ $personasnataurales[0]->cPaginaContacto}}">
	                                      </div>
	                                    </div>
	                                    <div class="form-group">
		                                    <div class="row">
		                                    	<div class="col-sm-4">
			                                        <label class="color-azul">Estado:</label>
			                                        <input type="text" class="form-control text-center"  id="nombre_estado" name="nombre_estado" readonly value="{{ $personasnataurales[0]->nombre_estado}}">
		                                      	</div>
	                                    	</div>
	                                    </div>
	                                    <div class="form-group">
	                                    </div>
	                                    <label class="color-azul">Ubicar su Negocio en el Mapa:</label>
	                                    
	                                    <div class="form-group">
	                                      <div class="row">  
	                                        <div class="col-xs-12 col-sm-6">
	                                            <label class="color-azul">Latitud</label>
	                                            <input type="text" name="nLatitudNegocio" id="nLatitudNegocio" class="form-control text-center" value="{{ $personasnataurales[0]->nLatitudNegocio}}" required pattern="" title="" readonly>
	                                          </div>
	                                        <div class="col-xs-12 col-sm-6">
	                                          <label class="color-azul">Longitud</label>
	                                          <input type="text" name="nLongitudNegocio" id="nLongitudNegocio" class="form-control text-center" value="{{ $personasnataurales[0]->nLongitudNegocio}}" required  readonly>
	                                        </div>
	                                      </div>
	                                      <div class="form-group">
	                                      </div>
	                                     <div class="row">  
	                                        <div class="col-xs-12">
	                                        <center><div id='map_canvas' style="background:#f7f7f7;"></div></center>
	                                        </div>
	                                      </div>    
	                                    </div>

        	</div>
		</div>
	</div>
@endsection

@section('script-fin')
<script>

$(document).ready(function()
{

   initialize();

var map = null;
var infoWindow = null;
 
function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    $('#nLatitudNegocio').val(markerLatLng.lat());
    $('#nLongitudNegocio').val(markerLatLng.lng());
}

function initialize() {
    var myLatlng = new google.maps.LatLng($('#nLatitudNegocio').val(),$('#nLongitudNegocio').val());
    var myOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($('#map_canvas').get(0), myOptions);
    

    infoWindow = new google.maps.InfoWindow({});
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: false,
        map: map,
        title:'Arrastre el Marcador Hasta Ubicar su Negocio.'
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
}
});

</script>
@endsection