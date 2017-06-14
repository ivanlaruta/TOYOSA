@extends('layouts.main')

@section('content')
        
  <div class="right_col" role="main">
          <div class="">
          <div class="page-title">
              <div class="title_left">
                <h2>
             <a href="{{ route('envios.index')}}">SOLICITUDES /  </a>
                    <a href="{{ route('envios.detalle',$id)}}">SOLICITUD {{$env->id_solicitud}} / </a>
                    <small>Unidades reservadas</small>
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

              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                   
                   <small>Unidades</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     
                    </p>
                      {!! Form::open(array('route' => ['envios.enviar_parcial'], 'method' => 'get' , 'id'=>'loginForm')) !!}

<input id="id" name="id" type="hidden" value="{{$det->id_solicitud}}">
<input id="id_detalle" name="id_detalle" type="hidden" value="{{ $det->id_detalle }}">


  <div class=" row">
    <div class="col-md-5 col-lg-offset-4">
      
      <div class="col-md-12">
        <div class="form-group">
            <label class="control-label col-md-6" >Cantidad Aprobada: </label>
            <div class="col-md-6">
              {{$det->cantidad_aprobada}}
            </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <label class="control-label col-md-6" >Cantidad Enviada: </label>
            <div class="col-md-6">
              {{$det->cantidad_enviada}}
            </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
        <hr>
            <label class="control-label col-md-6" ><p class="text-danger">Cantidad Restante:</p> </label>
            <div class="col-md-6">
              <p class="text-danger">{{$det->cantidad_aprobada-$det->cantidad_enviada}}</p>
              
            </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class=" row">
    <div class="col-md-12">
      
      <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-6" >Cantidad a enviar: </label>
            <div class="col-md-6">
              {!! Form::number('cant',null,['class'=> 'form-control','placeholder'=>'Ingrese cantidad','min'=>'1' ,'max'=>$det->cantidad_aprobada-$det->cantidad_enviada,'required'])!!}
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-6" >Fecha estimada de arribo: </label>
            <div class="col-md-6">
              <input type="text" name = "f_env" class="form-control has-feedback-left" id="f_env" aria-describedby="inputSuccess2Status2">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status2" class="sr-only">(success)</span>
            </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class=" row">
    <div class="col-md-12">
      
      <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-6" >Responsable de envio </label>
            <div class="col-md-6">
              {!! Form::text('resp',null,['class'=> 'form-control','placeholder'=>'Responsable de enivo','required','name'=>'resp'])!!}
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-6" >transportadora: </label>
            <div class="col-md-6">
              {!! Form::text('transp',null,['class'=> 'form-control','placeholder'=>'Empresa transportadora','required'])!!}
            </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class=" row">
    <div class="col-md-12">
      <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-6" >Placa:</label>
            <div class="col-md-6">
              {!! Form::text('placa',null,['class'=> 'form-control','placeholder'=>'Placa tranpostador','required'])!!}
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-6" >Conductor: </label>
            <div class="col-md-6">
              {!! Form::text('conductor',null,['class'=> 'form-control','placeholder'=>'Nombre conductor','required'])!!}
            </div>
        </div>
      </div>
    </div>
  </div>
<br>
  <div class=" row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label col-md-3" >Observaciones:</label>
            <div class="col-md-9">
              {!! Form::text('observaciones',null,['class'=> 'form-control','placeholder'=>'Observaciones','required'])!!}
            </div>
        </div>
    </div>
  </div>




<div class="modal-footer">
<div class="form-group">
    <div class="col-md-6 col-lg-offset-3">
  <div class="btn-group btn-group-justified">
    <a href="#" class=" btn btn-default btn-round" data-dismiss="modal">Cerrar</a>
    
    {{-- <a href="#"  class=" btn btn-success btn-round" onclick="$(this).closest('form').submit() ">Enviar</a> --}}
    {!! Form::submit('registrar',['class'=>'btn btn-success  btn-round'])!!}
    
  </div>
  </div>
</div>
</div>

{!! Form::close()!!}



                  </div>
                </div>
              </div>
             </div>
            </div>
              
@endsection

@section('scripts')
<script>

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
