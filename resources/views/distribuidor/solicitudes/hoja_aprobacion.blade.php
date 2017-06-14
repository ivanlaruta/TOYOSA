@extends('layouts.main')

@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>
                
                    @if($env->estado == '3')<a href="{{ route('solicitudes.index')}}">APROBADOS /  </a>@endif
                    @if($env->estado == '4')<a href="{{ route('solicitudes.index')}}">APROBADOS EN ENVIO /  </a>@endif
                    <a href="{{ route('solicitudes.detalle',$id)}}">SOLICITUD {{$env->id_solicitud}} / </a><small>Unidades reservadas</small>
                </h2>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Buscar</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel ">
                  <div class="x_title">
                    <h2>
                    
                   Datos generales
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content " style="display: none;" >
                    <!-- Smart Wizard -->   
                      <div>
                        <form class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">FECHA CREACION</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                      
                            {!! Form::text('fecha_creacion', $env->fecha_creacion,['class'=> 'form-control', 'readonly'])!!}
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">ORIGEN</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             {!! Form::text('origen', $env->origen,['class'=> 'form-control', 'readonly'])!!}
                            
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">DESTINO</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               {!! Form::text('destino',$env->destino,['class'=>'form-control','readonly'])!!}
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">TIPO</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            
                              {!! Form::text('tipo',$env->tipo,['class'=>'form-control ','readonly'])!!}

                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">OBSERVACIONES</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::text('observaciones', $env->observaciones,['class'=> 'form-control','readonly'])!!}
                            </div>
                          </div>      
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

             
              {{-- LISTA --}}   
        
              <div class="row">
                
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel ">
                  <div class="x_title">
                    <h2>Unidades reservadas por aprobar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- Smart Wizard -->
                      <div>
                       
                       <p class="text-muted font-13 m-b-30"></p>

                     <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr >
                          <th>#</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Master</th>
                          <th>Año</th> 
                          <th>Exterior</th>
                          <th>Interior</th>
                          <th>Chassis</th>
                          <th></th>
                        </tr>
                      </thead>
                        
                      <tbody>
                      <?php $a = 0; ?>
                        @foreach($det_all as $dets)
                        <tr @if($dets -> validado == '1') class="selected" @endif>
                        <td>{{ $dets -> ITEM }}</td>
                        <td>{{ $dets -> vehiculo -> MARCA }}</td>
                        <td>{{ $dets -> vehiculo -> MODELO }}</td>
                        <td>{{ $dets -> vehiculo -> MASTER }}</td>
                        <td>{{ $dets -> vehiculo -> ANIO_MOD }}</td>
                        <td>{{ $dets -> vehiculo -> COLOR_EXTERNO }}</td>
                        <td>{{ $dets -> vehiculo -> COLOR_INTERNO }}</td>
                        <td>{{ $dets -> chassis }}</td>
                        <td> @if($dets -> validado == '1')
                        <button type="button" class="btn btn-success btn-round btn-xs">
                          <span class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Correcto"></span>
                        </button>
                        @else
                        <?php $a=1; ?>
                        <button type="button" class="btn btn-danger btn-round btn-xs">
                          <span class="fa fa-close" data-toggle="tooltip" data-placement="bottom" title="Este chassis ya NO se encuentra disponible"></span>
                        </button>
                        @endif </td>
                        
                        @endforeach
                       
                      </tbody>
                    </table>
                    
                  </div>
                      
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              {{-- fin LISTA --}}
              
              <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel ">
                  <div class="x_content">
                      <div>

                        
                        <div class="form-group">
                        <div class="col-md-12">
                          <div class="btn-group btn-group-justified">
                            <a href="{{ route('solicitudes.detalle',$id)}}" class= "btn btn-danger btn-round"  >CANCELAR</a>
                            <a href="{{ route('solicitudes.aprobacion',$env)}}" @if($a == 1 ) class= "btn btn-warning btn-round" @else class= "btn btn-success btn-round" @endif >APROBAR</a>
                            
                          </div>
                        </div>
                        </div>
            
                      <hr>
                      <br>
                    </div>
                  </div>
                </div>
              </div>

                </div>
              </div>
            </div>


            </div>
          </div>
        
@endsection

@section('scripts')
<script type="text/javascript">

  var eta = $("#f_env");
  eta.daterangepicker({
    singleDatePicker:true,
    minDate: moment(),
    locale: {
            format: 'YYYY-MM-DD'
        }
  });

</script>

@endsection

