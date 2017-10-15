<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    {{-- <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" /> --}}
                    
                    <img src="/img/avatar.png" class="img-circle" alt="Imagen" />
                
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        
            
        

        <!-- search form (Optional) -->
       {{--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
        @if(Auth::user()->hasRole('admin'))
            <!-- Menu de Acciones para el Rol : Administrador.-->
            <li><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li><a href="{{url('admin/PersonaNatural')}}"><i class='fa fa-link'></i> <span> R. Persona Natural</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="{{url('admin/PersonaNatural')}}">Mantenimiento Personas</a></li>
                </ul>
            </li>
            <li class="treeview">
                  <a href="#">
                    <i class="fa fa-fw fa-database"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url('Reportes')}}" ><i class="fa fa-circle-o"></i> Reportes </a></li>
                <li><a href="{{url('listado_graficas')}}" ><i class="fa fa-square"></i> Graficos </a></li>
                
              </ul>
            </li>
        @endif
        @if(Auth::user()->hasRole('cajero'))
            <!-- Menu de Acciones para el Rol : Cajero.-->
            <li><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li><a href="{{url('admin/PersonaNatural')}}"><i class='fa fa-link'></i> <span> R. Persona Natural</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="{{url('admin/PersonaNatural')}}">Mantenimiento Personas</a></li>
                </ul>


            </li>
            <li class="treeview">
                  <a href="#">
                    <i class="fa fa-fw fa-database"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url('Reportes')}}" ><i class="fa fa-circle-o"></i> Reportes </a></li>

                
              </ul>
            </li>
        @endif




        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
