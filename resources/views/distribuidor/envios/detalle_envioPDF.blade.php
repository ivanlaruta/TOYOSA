
@extends('layouts.reporte')
@section('content')
  
      <div>
        <div class="tituloRep">
          NOTA DE ENVIO N° {{$envio->id_envio}}
        </div>
        <div class="filtro">
          DERIVADO DE LA SOLICITUD N° {{$envio->id_solicitud}}/{{$envio->id_detalle}}
        </div>
        <div class="filtro">
          APROBADO EL {{date('d-m-Y',strtotime($solicitud->fecha_aprobado))}}
        </div>
      </div>

      <hr>

<div class="row">
  <div class="col-4">
    <label>FECHA ENVIO: </label><label class="text-det"> {{date('d-m-Y',strtotime($envio->fecha_envio))}}</label>
    </div>
  <div class="col-4">
    <label>FECHA EST. ARRIBO: </label><label class="text-det"> {{date('d-m-Y',strtotime($envio->fecha_estimada_arribo))}}</label>
  </div>
  <div class="col-4">
    <label>DESTINO: </label><label class="text-det">{{$envio->destino}}</label>
  </div>
</div>

<div class="row">
  <div class="col-4">
    <label>RESPONSABLE: </label><label class="text-det">{{$envio->responsable}}</label>
  </div>
  <div class="col-4">
    <label>TRANSPORTADORA:  </label><label class="text-det">{{$envio->transportadora}}</label>
  </div>
  <div class="col-4">
    <label>CONDUCTOR:  </label><label class="text-det">{{$envio->conductor}}</label>
  </div>
</div>

<div class="row">
  <div class="col-4">
    <label>PLACA:  </label><label class="text-det">{{$envio->placa}}</label>
  </div>
  <div class="col-6">
    <label>OBSERVACION:  </label><label class="text-det">{{$envio->observaciones}}</label>   
  </div>
</div>

<hr>

<div class="row">
  <div class="col-4">
    <label>CODIGO MARCA: </label><label class="text-det">{{$detalle->cod_marca}}</label>
  </div>
  <div class="col-8">
    <label>MARCA: </label><label class="text-det">{{$detalle->marca -> MARCA }}</label>
  </div>
</div>

<div class="row">
  <div class="col-4">
    <label>CODIGO MODELO: </label><label class="text-det">{{$detalle->cod_modelo}}</label>
  </div>
  <div class="col-8">
    <label>MODELO: </label><label class="text-det">{{$detalle->modelo -> MODELO }}</label>
  </div>
</div>  

<div class="row">
  <div class="col-4">
    <label>CODIGO MATER: </label><label class="text-det">{{$detalle->cod_master}}</label>
  </div>
  <div class="col-8">
    <label>MATER: </label><label class="text-det">{{$detalle->master -> MASTER }}</label>
  </div>
</div>    



<div class="row">
  <div class="col-4">
    <label>AÑO: </label><label class="text-det">{{$detalle->anio}}</label>
  </div>
  <div class="col-4">
    <label>COLOR EXTERIOR: </label><label class="text-det">{{$detalle->col_ext}}</label>
  </div>
  <div class="col-4">
    <label>COLOR INTERIOR: </label><label class="text-det">{{$detalle->col_int}}</label>
  </div>
</div>              

<br>  
<div class="row">
<div class="table-responsive" align="center">
      <table class="table ">
       
        <thead>
          <tr>
            <th>#</th>
            <th>Chassis</th>
            <th>Salida por Codigo de Barras</th>
          </tr>
        </thead>
        <tbody>
          @foreach($unidades as $uni)
         <tr> 
            <td>{{ $uni -> ITEM }}</td>
            <td>{{ $uni -> chassis }}</td>
            <td>
            @if($uni -> salida_cb == 1) 
              SI
            @else
              NO
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>
<hr>                
     <label> Total Unidades: {{$envio->cantidad_enviada}}</label>

<div class="row">
  <div class="col-4">
    
  </div>
    
<div class="col-4">
<hr>
    <label class="text-foo"><p>ENTREGUE CONFORME:</p></label> 
    <label class="text-foo"><p>{{$envio->responsable}}</p></label>
  </div>
    

@endsection
