<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ trans('sociales.aplication_og_description')}}">
    <meta name="author" content="Departamento de Tecnología de Información">

    @include('adminlte::layouts.partials.sociales')

    <title>Sistema de Facturación</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="icon" type="image/png" href="/img/ico.png" sizes="16x16">

    <style>
        .verde
        {
            color:green;
        }
        .fa-exclamation-circle,.fa-shopping-cart,.fa-bar-chart
        {
            color:#3c8dbc;
        }
        .azul
        {
            color:#3c8dbc;   
        }
        .fa-facebook-square,.fa-facebook-square:hover
        {
            color:#3b5998;
        }
        .fa-youtube-square
        {
            color:red;
        }
        .fa-twitter-square,.fa-twitter-square:hover
        {
            color:#3c8dbc;
        }
        #jumbotron-landing
        {background-image: url({{ asset('/img/pexels6.png') }});}

        #footerwrap {
                background-color:  #3c8dbc;
        }
    </style>
</head> 

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><b class="text-warning">{{ trans('sociales.aplication_og_title')}}</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="#desc" class="smoothScroll">{{ trans('adminlte_lang::message.description') }}</a></li>
                    {{-- <li><a href="#showcase" class="smoothScroll">{{ trans('adminlte_lang::message.showcase') }}</a></li> --}}
                    <li><a href="#contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <section id="home" name="home">
         <div id="jumbotron-landing" class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="pull-left">
            {{-- <img src="images/logjo.png" alt="Logooo"> --}}
          </div>
          <div class="pull-right">
            <div itemscope itemtype="https://schema.org/FollowAction">
                <a class="sociales" href="http://www.gooogle.com" target="_blank" title="Facebook" itemprop="followee"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                <a  class="sociales" href="http://www.gooogle.com" target="_blank" title="Twitter" itemprop="followee"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                <a class="sociales" href="http://www.gooogle.com" target="_blank" title ="YouTube" itemprop="followee"><i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></a>
                </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-xs-12">
            <h1><strong class="azul">SISTEMA DE FACTURACION</strong></h1>
            <h3><strong  class="azul">REALIZA LAS VENTAS QUE NECESITAS EN TU NEGOCIO</strong></h3>
          </div>
        </div>

              
      </div>
   </div>
    </section>

<section id="desc" name="desc">
        <!-- INTRO WRAP -->
        <div id="intro">
            <div class="container">
                <div class="row centered">
                  <div class="col-xs-12">
                    <h1 class="verde">Características</h1>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <i class="fa fa-exclamation-circle fa-5x"></i>
                    <h3>Mas de  <strong class="azul">1000 clientes</strong> confian en nosotros </h3>
                    <p>Un <strong class="azul">sistema</strong> seguro y confiable con las necesidades acordes al mercado</p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <i class="fa fa-shopping-cart fa-5x" aria-hidden="true"></i>
                      <h3>Realiza tus <strong class="azul">Ventas</strong> de manera segura</h3>
                      <p>El registro de <strong class="azul">clientes</strong> es de manera rápida y confiable</p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <i class="fa fa-bar-chart fa-5x"></i>
                    <h3>Reporte de <strong class="azul">Ventas</strong> diario, semanal y anual.</h3>
                    <p>Seguimiento <strong class="azul">cómodo</strong>. seguro y confiable como tú te lo mereces</p>
                  </div>
                </div>
                <div class="row centered">
                  <div class="col-xs-12 col-sm-4">
                    <i class="fa fa-exclamation-circle fa-5x"></i>
                    <h3>Mas de  <strong class="azul">1000 clientes</strong> confian en nosotros </h3>
                    <p>Un <strong class="azul">sistema</strong> seguro y confiable con las necesidades acordes al mercado</p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <i class="fa fa-shopping-cart fa-5x" aria-hidden="true"></i>
                      <h3>Realiza tus <strong class="azul">Ventas</strong> de manera segura</h3>
                      <p>El registro de <strong class="azul">clientes</strong> es de manera rápida y confiable</p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <i class="fa fa-bar-chart fa-5x"></i>
                    <h3>Reporte de <strong class="azul">Ventas</strong> diario, semanal y anual.</h3>
                    <p>Seguimiento <strong class="azul">cómodo</strong>. seguro y confiable como tú te lo mereces</p>
                  </div>
                </div>
            </div> <!--/ .container -->
        </div><!--/ #introwrap -->
    </section>
    

   {{--  <section id="showcase" name="showcase">
        <div id="showcase">
            <div class="container">
                <div class="row">
                    <h1 class="centered">{{ trans('adminlte_lang::message.screenshots') }}</h1>
                    <br>
                    <div class="col-lg-8 col-lg-offset-2">
                        <div id="carousel-example-generic" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('/img/item-01.png') }}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('/img/item-02.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div><!-- /container -->
        </div>
    </section> --}}

    <section id="contact" name="contact">
        <div id="footerwrap">
            <div class="container">
                <div class="col-lg-2">
                    <h3><strong>{{ trans('adminlte_lang::message.address') }}</strong></h3>
                    <p>
                        Urb. Bellamar S/N,<br/>
                        Nuevo Chimbote,<br/>
                        0051<br/>
                        Perú
                    </p>
                </div>

                <div class="col-lg-7">
                    <h3><strong>{{ trans('adminlte_lang::message.dropus') }}</strong></h3>
                    <br>
                    <form role="form" action="#" method="post" enctype="plain">
                        <div class="form-group">
                            <label for="name1">{{ trans('adminlte_lang::message.yourname') }}</label>
                            <input type="name" name="Name" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                        </div>
                        <div class="form-group">
                            <label for="email1">{{ trans('adminlte_lang::message.emailaddress') }}</label>
                            <input type="email" name="Mail" class="form-control" id="email1" placeholder="{{ trans('adminlte_lang::message.enteremail') }}">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('adminlte_lang::message.yourtext') }}</label>
                            <textarea class="form-control" name="Message" rows="3"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-large btn-success">{{ trans('adminlte_lang::message.submit') }}</button>
                    </form>
                </div>
                <div class="col-lg-3">
                    <br>
                    <br>
                    <img src="/img/emailcall.jpg" class="img img-responsive" style="margin:0 auto; border: solid 5px white;" alt="Contáctanos">
                </div>
            </div>
        </div>
    </section>
    <footer>
            <div class="container centered">
                <div itemscope itemtype="https://schema.org/FollowAction">
                <a class="sociales" href="http://www.gooogle.com" target="_blank" title="Facebook" itemprop="followee"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                <a  class="sociales" href="http://www.gooogle.com" target="_blank" title="Twitter" itemprop="followee"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                <a class="sociales" href="http://www.gooogle.com" target="_blank" title ="YouTube" itemprop="followee"><i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></a>
                </div>
            </div>
    </footer>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
