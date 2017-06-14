@extends('layouts.main')

@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h2>
                @if($env->estado == '1')<a href="{{ route('solicitudes.index')}}">BORRADORES /  </a>@endif
                    @if($env->estado == '2') <a href="{{ route('solicitudes.index')}}">EN ESPERA DE APROBACION /  </a> @endif
                    @if($env->estado == '3')<a href="{{ route('solicitudes.index')}}">APROBADOS /  </a>@endif
                    @if($env->estado == '4')<a href="{{ route('solicitudes.index')}}">APROBADOS - ENVIADOS PARCIALMENTE /  </a>@endif
                    @if($env->estado == '5')<a href="{{ route('solicitudes.index')}}">APROBADOS - ENVIADOS COMPLETOS /  </a>@endif
                    <small class="text-danger" ><u>SOLICITUD {{$env->id_solicitud}} </u></small>

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

              {{-- fin general --}}

             {{-- detalle (agregar unidades)--}}
            @if($env->estado < '2')
            <div @if(is_null($request->marca)) class="row animated shake" @else  class="row" @endif>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar Unidades</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i @if(is_null($request->marca)) class="fa fa-chevron-down" @else class="fa fa-chevron-up" @endif ></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div  class="x_content" @if(is_null($request->marca))  style="display: none;"  @endif>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="col-md-4">

                        {!! Form::open(array('route' => ['solicitudes.detalle',$env->id_solicitud], 'method' => 'get','class' => 'form-horizontal form-label-left')) !!}﻿
                       
                            <label class="control-label " for="first-name">MARCA</label>
                           
                            {!! Form::select('marca',$marcas,$request->marca,['class'=>'form-control','placeholder'=>'seleccione una marca' ,'onchange'=>'this.form.submit();'])!!}

                        {!! Form::close()!!}
                        </div>
                        <div class="col-md-4">                       
                        
                        {!! Form::open(array('route' => ['solicitudes.detalle',$env->id_solicitud], 'method' => 'get','class' => 'form-horizontal form-label-left')) !!}﻿
                          <input id="marca" name="marca" type="hidden" value="{{ $request->marca }}">
                         
                            <label class="control-label " for="first-name">MODELO</label>
                        
                            @if(is_null($request->marca))
                             {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'seleccione una marca','readonly'])!!}
                            @else
                            
                            {!! Form::select('modelo',$modelos,$request->modelo,['class'=>'form-control','placeholder'=>'seleccione un modelo' ,'onchange'=>'this.form.submit();'])!!}
                            
                            @endif
                           
                        {!! Form::close()!!}
                        </div>
                        <div class="col-md-4"> 

                        {!! Form::open(array('route' => ['solicitudes.detalle',$env->id_solicitud], 'method' => 'get','class' => 'form-horizontal form-label-left')) !!}﻿
                          <input id="marca" name="marca" type="hidden" value="{{ $request->marca }}">
                          <input id="modelo" name="modelo" type="hidden" value="{{ $request->modelo }}">
                         
                              <label class="control-label " for="first-name">MASTER</label>
                             
                              @if(is_null($request->marca) || is_null($request->modelo))
                               {!! Form::text('master',null,['class'=>'form-control','placeholder'=>'seleccione una marca y un modelo','readonly'])!!}

                            @else
                              
                              {!! Form::select('master',$masters,$request->master,['class'=>'form-control','placeholder'=>'seleccione un master' ,'onchange'=>'this.form.submit();'])!!}
                              
                            @endif
                           
                        {!! Form::close()!!}
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4">
                        {!! Form::open(array('route' => ['solicitudes.detalle',$env->id_solicitud], 'method' => 'get','class' => 'form-horizontal form-label-left')) !!}﻿
                          <input id="marca" name="marca" type="hidden" value="{{ $request->marca }}">
                          <input id="modelo" name="modelo" type="hidden" value="{{ $request->modelo }}">
                          <input id="master" name="master" type="hidden" value="{{ $request->master }}">

                              <label class="control-label " for="first-name">AÑO</label>
                             
                                @if(is_null($request->marca) || is_null($request->modelo) || is_null($request->master))
                               {!! Form::text('anio',null,['class'=>'form-control','placeholder'=>'seleccione una marca, modelo y master','readonly'])!!}
                               
                            @else
                              
                              {!! Form::select('anio',$anios,$request->anio,['class'=>'form-control','placeholder'=>'seleccione un año' ,'onchange'=>'this.form.submit();'])!!}
                              
                            @endif
                           
                        {!! Form::close()!!}
                        </div>
                        <div class="col-md-4"> 
                        {!! Form::open(array('route' => ['solicitudes.detalle',$env->id_solicitud], 'method' => 'get','class' => 'form-horizontal form-label-left')) !!}﻿
                          <input id="marca" name="marca" type="hidden" value="{{ $request->marca }}">
                          <input id="modelo" name="modelo" type="hidden" value="{{ $request->modelo }}">
                          <input id="master" name="master" type="hidden" value="{{ $request->master }}">
                          <input id="anio" name="anio" type="hidden" value="{{ $request->anio }}">

                              <label class="control-label " for="first-name">COLOR EXTERIOR</label>
                              
                                @if(is_null($request->marca) || is_null($request->modelo) || is_null($request->master) || is_null($request->anio))
                               {!! Form::text('ext',null,['class'=>'form-control','placeholder'=>'seleccione un color','readonly'])!!}
                               
                            @else
                              
                              {!! Form::select('ext',$exteriores,$request->ext,['class'=>'form-control','placeholder'=>'seleccione un color' ,'onchange'=>'this.form.submit();'])!!}
                              
                            @endif
                           
                        {!! Form::close()!!}
                        </div>
                        <div class="col-md-4"> 

                        {!! Form::open(array('route' => ['solicitudes.detalle',$env->id_solicitud], 'method' => 'get','class' => 'form-horizontal form-label-left')) !!}﻿
                          <input id="marca" name="marca" type="hidden" value="{{ $request->marca }}">
                          <input id="modelo" name="modelo" type="hidden" value="{{ $request->modelo }}">
                          <input id="master" name="master" type="hidden" value="{{ $request->master }}">
                          <input id="anio" name="anio" type="hidden" value="{{ $request->anio }}">
                          <input id="ext" name="ext" type="hidden" value="{{ $request->ext }}">
                         
                              <label class="control-label " for="first-name">COLOR INTERIOR</label>
                              
                                @if(is_null($request->marca) || is_null($request->modelo) || is_null($request->master) || is_null($request->anio) || is_null($request->ext))
                               {!! Form::text('int',null,['class'=>'form-control','placeholder'=>'seleccione un color','readonly'])!!}
                            @else
                              {!! Form::select('int',$interiores,$request->int,['class'=>'form-control','placeholder'=>'seleccione un color' ,'onchange'=>'this.form.submit();'])!!}
                            @endif
                            

                        {!! Form::close()!!}
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        {!! Form::open(array('route' => ['solicitudes.addDetalle',$env->id_solicitud], 'method' => 'get','class' => 'form-horizontal form-label-left')) !!}﻿

                          <input id="marca" name="marca" type="hidden" value="{{ $request->marca }}">
                          <input id="modelo" name="modelo" type="hidden" value="{{ $request->modelo }}">
                          <input id="master" name="master" type="hidden" value="{{ $request->master }}">
                          <input id="anio" name="anio" type="hidden" value="{{ $request->anio }}">
                          <input id="ext" name="ext" type="hidden" value="{{ $request->ext }}">
                          <input id="int" name="int" type="hidden" value="{{ $request->int }}">

                          @if(is_null($request->marca) || is_null($request->modelo) || is_null($request->master) || is_null($request->anio) || is_null($request->ext) || is_null($request->int))

                          <div class="col-md-4">
                                <label class="control-label " for="first-name">CANTIDAD DISPONIBLE</label>
                                
                                {!! Form::text('disp',NULL,['class'=>'form-control','readonly'])!!}
                          </div>
                          <div class="col-md-4"> 
    
                                <label class="control-label " for="first-name">CANTIDAD A ASIGNAR</label>
                               
                                {!! Form::number('cant',null,['class'=> 'form-control','placeholder'=>'Ingrese cantidad','readonly'])!!}<hr>
                          </div>
                          <br>
                          {{-- <div class="col-md-4">
                              
                                  <button type="button" class = "btn btn-success btn-block disabled">AGREGAR A LA LISTA</button>
                              
                          </div> --}}

                          </div>
                          
                            @else
                            <div class="col-md-4"> 
                          
                                <label class="control-label " for="first-name">CANTIDAD DISPONIBLE</label>
                              
                                {!! Form::text('disp',$count.' unidades',['class'=>'form-control animated flash','readonly'])!!}
                             </div>
                            <div class="col-md-4"> 

                                <label class="control-label " for="first-name">CANTIDAD A ASIGNAR</label>
                              
                                {!! Form::number('cant',null,['class'=> 'form-control','placeholder'=>'Ingrese cantidad','min'=>'1' ,'max'=>$count,'required'])!!}<hr>
                            </div>
                            <br>
                            <div class="col-md-4">
                                {!! Form::submit('AGREGAR A LA LISTA',['class'=>'btn btn-success btn-block animated flipInY'])!!}
                            </div>

                           </div>
                            
                            @endif
                    
                        {!! Form::close()!!}

                      </div>
                    </div>
                  </div>
                </div>
              @endif
              {{-- fin detalle --}}   

              {{-- LISTA --}}   
        
              <div class="row">
                
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel ">
                  <div class="x_title">
                    <h2>Detalle de solicitud</h2>
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
                        <tr>
                          <th>#</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Master</th>
                          <th>Año</th> 
                          <th>Color Exterior</th>
                          <th>Color Interior</th>
                          <th>Cant Solicitada</th>
                          @if($env->estado > '2') 
                          <th>Cant Aprobada </th> 
                          <th>Cant Enviada</th>
                          <th>Cant entregada</th>
                          @endif
                          <th>Opciones</th> 
                        </tr>
                      </thead>
                        
                      <tbody>
                        @foreach($det as $dets)
                        <tr>
                        <td>{{ $dets -> id_detalle}}</td>
                        <td>{{ $dets -> marca -> MARCA}}</td>
                        <td>{{ $dets -> modelo -> MODELO}}</td>
                        <td>{{ $dets -> master -> MASTER}}</td>
                        <td>{{ $dets -> anio }}</td>
                        <td>{{ $dets -> col_ext }}</td>
                        <td>{{ $dets -> col_int }}</td>
                        <td>{{ $dets -> cantidad}}</td>
                        @if($env->estado > '2')
                        <td>{{ $dets -> cantidad_aprobada}}</td>
                        <td>{{ $dets -> cantidad_enviada}}</td>
                        <td>{{ $dets -> cantidad_entregada}}</td>
                        @endif
                        <td align="center">
                        <div class="btn-group">
                          @if($env->estado >= '2')
                          <a href="{{ route('solicitudes.detalle_all',['id'=>$env->id_solicitud,'id2'=>$dets -> id_detalle ] )}}" class="btn btn-success btn-round btn-xs" data-toggle="tooltip" data-placement="bottom" title="Ver unidades reservadas" ><i class="fa fa-car"></i></a> 
                          @endif
                          @if($env->estado < '2')
                          <button type="button" class="btn btn-warning btn-round btn-xs" data-toggle="tooltip" data-placement="bottom" title="Editar Cantidad"><i class="fa fa-edit"></i></button>
                            
                          <a href="{{ route('solicitudes.quitar_detalle',['id'=>$env->id_solicitud,'id2'=>$dets -> id_detalle ] )}}" class="btn btn-danger btn-round btn-xs" data-toggle="tooltip" data-placement="bottom" title="Quitar Seleccion" ><i class="fa fa-trash-o"></i></a> 
                          @endif
                          
                        </div>
                       
                        </td>
                        @endforeach
                       
                      </tbody>
                    </table>
                       @if($env->estado >= '2')
                      </div>
                      <hr>
                      <div class="col-md-12">
                      <a href="{{ route('solicitudes.detalle_all',['id'=>$env->id_solicitud,'id2'=>'0' ])}}">
                        <div class="panel-footer">
                            <span class="pull-left">Ver todas las unidades reservadas por esta solicitud</span>
                            <span class="pull-right"><i class="fa fa-car"></i></span>
                            <div class="clearfix"></div>
                        </div>
                      </a>
                      </div>
                      </div>
                      @endif
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

                        @if($env->estado == '1')
                        <div class="form-group">
                        <div class="col-md-12">
                          <div class="btn-group btn-group-justified">
                            <a href="{{ route('solicitudes.index')}}" class=" btn btn-warning btn-round">GUARDAR COMO BORRADOR</a>

                            <a href="{{ route('solicitudes.espera',$env)}}" onclick ="return confirm('El sistema seleccionara unidades automáticamente y se las reservara. ¿Desea continuar?')"   @if($det->isEmpty()) class="btn btn-primary btn-round disabled" @else  class="btn btn-primary btn-round" @endif>GUARDAR Y ESPERAR APROBACION</a>

                            <a href="" @if($det->isEmpty()) class="btn btn-success btn-round disabled" @else  class=" btn btn-success btn-round" @endif>GUARDAR Y APROBAR</a>
                            
                          </div>
                        </div>
                        </div>
                        @endif

                        @if($env->estado == '2')
                        <div class="form-group">
                        <div class="col-md-12">
                          <div class="btn-group btn-group-justified">

                            <a href="{{ route('solicitudes.index')}}" class="btn btn-primary btn-round">PAGINA ANTERIOR</a>
                            
                            @if(Auth::user()->rol=='1' ||  Auth::user()->rol=='3')
                            <a href="{{ route('solicitudes.aprobar',$env)}}" class="btn btn-success btn-round">APROBAR</a>
                            @endif
                            
                            
                          </div>  
                                               
                        </div>
                        </div>
                        @endif

                        @if($env->estado >= '3' )
                        <div class="form-group">
                        <div class="col-md-12">
                          <div class="btn-group btn-group-justified">
                            <a href="{{ route('solicitudes.index')}}" class=" btn btn-primary btn-round">PAGINA ANTERIOR</a>
                             @if(Auth::user()->rol=='1' ||  Auth::user()->rol>'3')
                            <a href="{{ route('envios.index')}}" class="btn btn-warning btn-round">VER EN ENVIOS </a>
                            @endif
                          </div>  
                                               
                        </div>
                        </div>


                        @endif 
                        

                       
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

