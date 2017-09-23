@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Listado de Personas Naturales
@endsection

@section('css')
	<style>
		.fa-list
		{
			color: #00a65a;
		}
		.fa-eye,.fa-pencil
		{
			color: #fff;
		}
		.active>span
		{
			color: #fff  !important;
			background-color: #00a65a  !important;
			border-color: #00a65a  !important;
		}
		.content-wrapper
		{
    		background-color: #ffffff;
		}
		.color-azul
		{
			color: #337ab7;
		}

		thead>tr
		{
			color: #337ab7;
		}

		thead>tr
		{
			background-color: #00a65a !important;
    		color: #fff !important;	
		}

		tr:hover
		{
    		background-color: #00a65a !important;
    		color: #fff !important;
		}
		

	</style>
@endsection

@section('script-inicio')
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
        		<h3 class="text-center color-azul"><strong><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Listado de Persona Natural&nbsp;<i class="fa fa-list" aria-hidden="true"></i></strong></h3>  
				@if(COUNT($personasnataurales) > 0) 
                          	<div class="table-responsive" id="lista-personanatural">
                              @include('adminlte::persona.personanaturaltable')
                          	</div> 
                        @else 
							<center>
                                <img src="/img/cero.png" title="0 PersonasNaturales" style="width:150px;height:150px;"/>
                                <p class="color-azul">No se encontraron registros de Personas Naturales.</p>
                                <p class="color-azul">Cuando Existan estas aparecerán aquí.</p>
                            </center>
                @endif
        	</div>
		</div>
	</div>
@endsection

@section('script-fin')
<script>
$(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                ObtenerListaPersonaNatural(page);
            }
        }
    });
$(document).ready(function()
{

	$(document).on('click', '.pagination a', function () {
		
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        ObtenerListaPersonaNatural(page);
	});

	function ObtenerListaPersonaNatural(page)
	{

	    $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            datatype: "html",
	            "_token": "{{ csrf_token() }}",
	        })
	        .done(function(data)
	        {
	            
	            $("#lista-personanatural").empty().html(data);

	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('Error al Traer la informacion...');
	        });
		}

});

</script>
@endsection