        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title">Inicio</a>
            </div>

            <div class="clearfix"></div>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-home"></i> Principal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('principal.index')}}">Vehiculos</a></li>
                      <li><a href="#">Productos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Stock <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('vehiculos.stock')}}"> Stock Vehiculos</a></li>
                      <li><a href="#">Stock Productos</a></li>
                      <li><a href="{{ route('vehiculos.index')}}">Unidades</a></li>
                    </ul>
                  </li>

                  @if(Auth::user()->rol=='1' || Auth::user()->rol=='2' || Auth::user()->rol=='3')
                  <li><a><i class="fa fa-table"></i> Solicitudes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      {{-- <li><a href="{{ route('solicitudes.index_espera')}}">En espera de aprobacion</a></li>
                      <li><a href="{{ route('solicitudes.index_aprobados')}}">Aprobados</a></li> --}}
                    
                      <li><a href="{{ route('solicitudes.index')}}">Lista de solicitudes</a></li>
                      <li><a href="{{ route('solicitudes.create')}}">Crear solicitud</a></li>
                    </ul>
                  </li>
                  @endif

                  @if(Auth::user()->rol=='1' || Auth::user()->rol=='5' || Auth::user()->rol=='4')
                  <li><a><i class="fa fa-table"></i> Envios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      {{-- <li><a href="{{ route('solicitudes.index_espera')}}">En espera de aprobacion</a></li>
                      <li><a href="{{ route('solicitudes.index_aprobados')}}">Aprobados</a></li> --}}
                    
                      <li><a href="{{ route('envios.index')}}">Estado Envio de solciitudes </a></li>
                      <li><a href="{{ route('envios.envios_lista')}}">Lista de envios </a></li>
                    
                    </ul>
                  </li>
                  @endif

                  <li><a><i class="fa fa-desktop"></i> Alertas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                            <li><a href="#">Reposicion Regular</a></li>
                            <li><a href="#">Reposicion Extraordinaria</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-globe"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('stocks.index')}}">Asignacion de Stock a regionales</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Solicitudes Pendientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Lista de solicitudes</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>
            </div>
           </div>
        </div>

