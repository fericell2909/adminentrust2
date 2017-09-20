@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Registro de Persona Natural
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
        		<h3 class="text-center color-azul"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Registro de Persona Natural&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></strong></h3>  
	        	<form method="POST" action="{{url('admin/PersonaNatural')}}" accept-charset="UTF-8" class="" id="RegistroFormPersonaNatural">
	        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
	                                    <div class="form-group row">
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Nombres:</label>
	                                          <input type="text" class="form-control text-center"  id="Nombres" name="Nombres"  required placeholder="Nombres" maxlength="20">
	                                          <span  id ="ErrorMensaje-Nombres" class="help-block"></span>
	                                        </div>
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Apellido Paterno:</label>
	                                          <input type="text" class="form-control text-center"  id="cApellidoPaterno" name="cApellidoPaterno"  required placeholder="Apellido Paterno" maxlength="40">
	                                          <span  id ="ErrorMensaje-cApellidoPaterno" class="help-block"></span>
	                                        </div>
	                                        <div class="col-sm-4">
	                                          <label class="color-azul">Apellido Materno:</label>
	                                          <input type="text" class="form-control text-center"  id="cApellidoMaterno" name="cApellidoMaterno"  required placeholder="Apellido Materno" maxlength="40">
	                                          <span  id ="ErrorMensaje-cApellidoMaterno" class="help-block"></span>
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Sexo:</label>
	                                        <select class="form-control text-center" name="sexo_id" id="sexo_id">
		                                        @foreach($sexos as $sexo)
				                                    <option value="{{ $sexo->id }}" >{{ $sexo->nombre_sexo}}</option>
		                              			@endforeach
	                            			</select>
	                                        <span  id ="ErrorMensaje-sexo_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Estado Civil:</label>
	                                        <select class="form-control text-center" name="estado_civil_id" id="estado_civil_id">
		                                        @foreach($estadosciviles as $estadoscivil)
				                                    <option value="{{ $estadoscivil->id }}">{{ $estadoscivil->nombre_estado_civil}}</option>
		                              			@endforeach
	                            			</select>
	                                        <span  id ="ErrorMensaje-estado_civil_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                          <label class="color-azul">Dni:</label>
	                                          <input type="text" class="form-control text-center"  id="dni" name="dni"  required placeholder="Dni" maxlength="8">
	                                          <span  id ="ErrorMensaje-dni" class="help-block"></span>
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Telefono:</label>
	                                        <input type="text" class="form-control text-center"  id="cTelefonoFijo" name="cTelefonoFijo"  required placeholder="043325090">
	                                        <span  id ="ErrorMensaje-cTelefonoFijo" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Celular:</label>
	                                        <input type="text" class="form-control text-center"  id="cCelular" name="cCelular"  required placeholder="Celular" maxlength="9">
	                                        <span  id ="ErrorMensaje-cCelular" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Correo Electrónico</label>
	                                        <input type="text" class="form-control text-center"  id="cCorreoElectronico" name="cCorreoElectronico"  placeholder="ejemplo@ejemplo.com">
	                                          <span  id ="ErrorMensaje-cCorreoElectronico" class="help-block"></span>
	                                      </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Departamento:</label>
	                                        <select class="form-control text-center" name="departamento_id" id="departamento_id">
		                                        @foreach($departamentos as $departamento)
				                                    <option value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
		                              			@endforeach
	                            			</select>
	                                        <span  id ="ErrorMensaje-departamento_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Provincia:</label>
											<select class="form-control text-center" name="provincia_id" id="provincia_id" style="display:none;">
											</select>
	                                        <span  id ="ErrorMensaje-provincia_id" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-4">
	                                        <label class="color-azul">Distrito:</label>
											<select class="form-control text-center" name="distrito_id" id="distrito_id" style="display:none;">
											</select>
	                                        <span  id ="ErrorMensaje-distrito_id" class="help-block"></span>
	                                      </div>
	                                    </div>
	                                    <div class="form-group row">
	                                      <div class="col-sm-6">
	                                        <label class="color-azul">Dirección de Negocio:</label>
	                                        <input type="text" class="form-control text-center" 
	                                        id="cDireccionNegocio" name="cDireccionNegocio"  required placeholder="Dirección de Negocio">
	                                        <span  id ="ErrorMensaje-cDireccionNegocio" class="help-block"></span>
	                                      </div>
	                                      <div class="col-sm-6">
	                                        <label class="color-azul">Pagina de Contacto:</label>
	                                        <input type="text" class="form-control text-center"  id="cPaginaContacto" name="cPaginaContacto"  placeholder="www.ejemplo.com">
	                                        <span  id ="ErrorMensaje-cPaginaContacto" class="help-block"></span>
	                                      </div>
	                                    </div>
	                                    <div class="form-group">
	                                        
	                                    </div>
	                                    <label class="color-azul">Ubicar su Negocio en el Mapa:</label>
	                                    
	                                    <div class="form-group">
	                                      <div class="row">  
	                                        <div class="col-xs-12 col-sm-6">
	                                            <label class="color-azul">Latitud</label>
	                                            <input type="text" name="nLatitudNegocio" id="nLatitudNegocio" class="form-control text-center" value="-12.10113608004072" required pattern="" title="" readonly>
	                                          </div>
	                                        <div class="col-xs-12 col-sm-6">
	                                          <label class="color-azul">Longitud</label>
	                                          <input type="text" name="nLongitudNegocio" id="nLongitudNegocio" class="form-control text-center" value="-77.03570354187013" required pattern="" title="" readonly>
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
	                                    
	                                   
	                                    <div class="row"> 
	                                      <div class="col-xs-12">
	                                       {{-- <a href ="" id="btnContinuarPasoUno" class="btn btn-block pull-left btn-principal btn-continuar"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:40px;"> Continuar</span></a> --}}
	                                       <button type="submit" id="btnRegistrarPersonaNatural" class="btn btn-block pull-left btn-success"><i class="fa fa-play-circle-o fa-3x" aria-hidden="true"></i><span style="font-size:20px;">&nbsp; Registrar Persona Natural</span></button>
	                                       <br>
	                                       <br>
	                                       <br>
	                                       <br>
	                                       <br>
	                                      </div>
	                                      
	                                    </div>
	          </form>
        	</div>
		</div>
	</div>
@endsection

@section('script-fin')
<script>

$(document).ready(function()
{
	$('#provincia_id option').remove();
	jQuery.ajax({
				  url: '../Zona/Listar_Provincias_x_Departamento/' + $('select[name=departamento_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=departamento_id]').val(),
						 "_token": "{{ csrf_token() }}",},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#provincia_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#provincia_id').show();
				  		$('#distrito_id option').remove();
							jQuery.ajax({
										  url: '../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
										  type: 'POST',
										  data: {id: $('select[name=provincia_id]').val(),
												 "_token": "{{ csrf_token() }}",},
										  success: function(respuesta){

										  		$.each(respuesta, function(index, val) {

								                            $('#distrito_id').append($('<option>', { 
								                                value:respuesta[index].id,
								                                text : respuesta[index].cNomZona
								                            }));
								                        });
										  		respuesta = null;
										  		
										  		$('#distrito_id').fadeIn("slow");
										  		//$('#provincia_id').show();
										  }
										})

				  }
				});

	// Llamada a Ajax para Carga de Provincias

	$("select[name=departamento_id]").change(function(){

		$('#provincia_id option').remove();
		jQuery.ajax({
				  url: '../Zona/Listar_Provincias_x_Departamento/' + $('select[name=departamento_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=departamento_id]').val(),
						 "_token": "{{ csrf_token() }}",},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#provincia_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#provincia_id').show();

				  		$('#distrito_id option').remove();
						jQuery.ajax({
								  url: '../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
								  type: 'POST',
								  data: {id: $('select[name=provincia_id]').val(),
										 "_token": "{{ csrf_token() }}",},
								  success: function(respuesta){

								  		$.each(respuesta, function(index, val) {

						                            $('#distrito_id').append($('<option>', { 
						                                value:respuesta[index].id,
						                                text : respuesta[index].cNomZona
						                            }));
						                        });
								  		respuesta = null;
								  		
								  		$('#distrito_id').show();
								  		//$('#provincia_id').show();
								  }
								})
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })

		      event.preventDefault();
	});

	$("select[name=provincia_id]").change(function(){

		$('#distrito_id option').remove();
		jQuery.ajax({
				  url: '../Zona/Listar_Distritos_x_Provincia/' + $('select[name=provincia_id]').val(),
				  type: 'POST',
				  data: {id: $('select[name=provincia_id]').val(),
						 "_token": "{{ csrf_token() }}",},
				  success: function(respuesta){

				  		$.each(respuesta, function(index, val) {

		                            $('#distrito_id').append($('<option>', { 
		                                value:respuesta[index].id,
		                                text : respuesta[index].cNomZona
		                            }));
		                        });
				  		respuesta = null;
				  		
				  		$('#distrito_id').show();
				  		//$('#provincia_id').show();
				  }
				})
				.fail(function() {
		          //console.log("error");
		    })

		      event.preventDefault();
	});


	// Fin de Llamada a AJax para Carga de Provincias


	// Llamada a Ajax para Carga de Distritos

	// Fin de Llamada a AJax para Carga de Distritos

   initialize();

    $('#Nombres').on("keypress",function (){
		$("#ErrorMensaje-Nombres").hide();
	})

    $('#cApellidoPaterno').on("keypress",function (){
		$("#ErrorMensaje-cApellidoPaterno").hide();
	})

	$('#cApellidoMaterno').on("keypress",function (){
		$("#ErrorMensaje-cApellidoMaterno").hide();
	})

	$('#dni').on("keypress",function (){
		$("#ErrorMensaje-dni").hide();
	})

	$('#cTelefonoFijo').on("keypress",function (){
		$("#ErrorMensaje-cTelefonoFijo").hide();
	})

	$('#cCelular').on("keypress",function (){
		$("#ErrorMensaje-cCelular").hide();
	})

	$('#cCorreoElectronico').on("keypress",function (){
		$("#ErrorMensaje-cCorreoElectronico").hide();
	})

	$('#cDireccionNegocio').on("keypress",function (){
		$("#ErrorMensaje-cDireccionNegocio").hide();
	})



    $("#btnRegistrarPersonaNatural").on("click", function(evt) 
    {
    
	    var Nombres = $('#Nombres').val().trim();

	    if( Nombres == null || Nombres.length == 0  ) {
	       Nombres = null;
	       $("#ErrorMensaje-Nombres").text('El Nombre no puede ser vacio.');
	         $("#ErrorMensaje-Nombres").show();
	         $("#Nombres").focus();
	         return false;
	       }

	    var cApellidoPaterno = $('#cApellidoPaterno').val().trim();

	    if( cApellidoPaterno == null || cApellidoPaterno.length == 0  ) {
	       cApellidoPaterno = null;
	       $("#ErrorMensaje-cApellidoPaterno").text('El Apellido Paterno no puede ser vacío.');
	         $("#ErrorMensaje-cApellidoPaterno").show();
	         $("#cApellidoPaterno").focus();
	         return false;
	       }

	    var cApellidoMaterno = $('#cApellidoMaterno').val().trim();

	    if( cApellidoMaterno == null || cApellidoMaterno.length == 0  ) {
	       cApellidoMaterno = null;
	       $("#ErrorMensaje-cApellidoMaterno").text('El Apellido Materno no puede ser vacío.');
	         $("#ErrorMensaje-cApellidoMaterno").show();
	         $("#cApellidoMaterno").focus();
	         return false;
	       }

	    var dni = $('#dni').val().trim();

	    if( dni == null || dni.length == 0  ) {
	       dni = null;
	       $("#ErrorMensaje-dni").text('El DNI no puede ser vacío.');
	         $("#ErrorMensaje-dni").show();
	         $("#dni").focus();
	         return false;
	       }

	    var cTelefonoFijo = $('#cTelefonoFijo').val().trim();

	    if( cTelefonoFijo == null || cTelefonoFijo.length == 0  ) {
	       cTelefonoFijo = null;
	       $("#ErrorMensaje-cTelefonoFijo").text('El Telefono no puede ser vacío.');
	         $("#ErrorMensaje-cTelefonoFijo").show();
	         $("#cTelefonoFijo").focus();
	         return false;
	       }

	    var cCelular = $('#cCelular').val().trim();

	    if( cCelular == null || cCelular.length == 0  ) {
	       cCelular = null;
	       $("#ErrorMensaje-cCelular").text('El Celular no puede ser vacío.');
	         $("#ErrorMensaje-cCelular").show();
	         $("#cCelular").focus();
	         return false;
	       }

	    var cCorreoElectronico = $('#cCorreoElectronico').val().trim();

	    if( cCorreoElectronico == null || cCorreoElectronico.length == 0  ) {
	       cCorreoElectronico = null;
	       $("#ErrorMensaje-cCorreoElectronico").text('El Correo Electrónico no puede ser vacío.');
	         $("#ErrorMensaje-cCorreoElectronico").show();
	         $("#cCorreoElectronico").focus();
	         return false;
	       }

	     if (!ValidarEmail(cCorreoElectronico)) {
		    	cCorreoElectronico=null;
		       $("#ErrorMensaje-cCorreoElectronico").text('Debe Ingresar un Email valido.');
  				$("#ErrorMensaje-cCorreoElectronico").show();
  				$("#cCorreoElectronico").focus();
  				return false;
		    }

		var cDireccionNegocio = $('#cDireccionNegocio').val().trim();

	    if( cDireccionNegocio == null || cDireccionNegocio.length == 0  ) {
	       cDireccionNegocio = null;
	       $("#ErrorMensaje-cDireccionNegocio").text('El Correo Electrónico no puede ser vacío.');
	         $("#ErrorMensaje-cDireccionNegocio").show();
	         $("#cDireccionNegocio").focus();
	         return false;
	       }   

    $('RegistroFormPersonaNatural').submit();
  });

var map = null;
var infoWindow = null;
 
function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    $('#nLatitudNegocio').val(markerLatLng.lat());
    $('#nLongitudNegocio').val(markerLatLng.lng());
}

function ValidarEmail(email){
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		 if (!regex.test(email)) {
		 	return false; //email incorrecto
		 }
		 else
		 {
		 	return true; // email correcto
		 }
}

function initialize() {
    var myLatlng = new google.maps.LatLng(-12.10113608004072, -77.03570354187013);
    var myOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($('#map_canvas').get(0), myOptions);
    

    infoWindow = new google.maps.InfoWindow({});
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: true,
        map: map,
        title:'Arrastre el Marcador Hasta Ubicar su Negocio.'
    });
 
    google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
}
});

</script>
@endsection