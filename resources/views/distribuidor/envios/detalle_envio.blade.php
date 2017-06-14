@extends('layouts.main')

@section('content')
<style>
td{
  text-align:center;
  
  }
  th{
  text-align:center;
  
  }
</style>
        
  <div class="right_col" role="main">
          <div class="">
         <div class="page-title">
              <div class="title_left">
                <h3>ENVIO</h3>
              </div>

             
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>NOTA DE ENVIO</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <br />
            <form id="demo-form2" class="form-horizontal form-label-left">
              <div class="col-md-12">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">N° Envio: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->id_envio,['class'=> 'form-control', 'readonly'])!!}
                      
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Fecha envio: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',date('d-m-Y',strtotime($envio->fecha_envio)),['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Fecha est. arribo: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',date('d-m-Y',strtotime($envio->fecha_estimada_arribo)),['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">N° Solicitud: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->id_solicitud,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">N° Sub pedido: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->id_detalle,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Fecha_aprovacion: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',date('d-m-Y',strtotime($solicitud->fecha_aprobado)),['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                 
              </div>
            
              <div class="col-md-12">
               <hr>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Origen: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->origen,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Destino: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->destino,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Responsable: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->responsable,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
              </div> 

              <div class="col-md-12">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Transportadora: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->transportadora,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Conductor: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->conductor,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Placa: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->placa,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
               <hr>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Codigo Marca: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->cod_marca,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Codigo Modelo: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->cod_modelo,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Codigo Mater: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->cod_master,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Marca: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->marca -> MARCA ,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Modelo: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->modelo -> MODELO ,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Mater: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->master -> MASTER ,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Año: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->anio,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Color exterior: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->col_ext,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label col-md-5">Color Interior: </label>
                    <div class="col-md-7 col-sm-6 col-xs-12">
                      {!!Form::text('env',$detalle->col_int,['class'=> 'form-control', 'readonly'])!!}
                    </div>
                  </div>
                </div>
              </div> 
          </form>
          <div class="clearfix"></div>
          <hr>
          <div class="x_title">
                    <h2>UNIDADES</h2>
                    
                    <div class="clearfix"></div>
                  </div>
          
                  <br>
                  <div class="table-responsive">
                    <table class="table ">
                     
                      <thead>
                        <tr>

                          <th>#</th>
                          <th>Chassis</th>
                          <th>Salida por Codigo de Barras</th>
                          <th>ingreso a destino por Codigo de Barras</th>
                          
                        </tr>
                      </thead>
                        
                      <tbody>
                        @foreach($unidades as $uni)
                       <tr> 
                          <td>{{ $uni -> ITEM }}</td>
                          <td>{{ $uni -> chassis }}</td>
                          <td>@if($uni -> salida_cb == 1) 
                          <button type="button" class="btn btn-success btn-round btn-xs">
                          <span class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Con salida en codigo de barras"></span>
                        </button>
                        @else
                        <button type="button" class="btn btn-danger btn-round btn-xs">
                          <span class="fa fa-close" data-toggle="tooltip" data-placement="bottom" title="Esta unidad no tiene una salida registrada en Codigo de barras"></span>
                        </button>
                         @endif</td>
                          <td>@if($uni -> llegada_cb == 1)
                          <button type="button" class="btn btn-success btn-round btn-xs">
                          <span class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="con ingreso en codigo de barras"></span>
                        </button>

                           @else
                           <button type="button" class="btn btn-danger btn-round btn-xs">
                          <span class="fa fa-close" data-toggle="tooltip" data-placement="bottom" title="Esta unidad no tiene un ingreso registrado en Codigo de barras"></span>
                        </button>
                         @endif</td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>


              <div class="col-md-12">
              <hr>
               
                  <div class="form-group">
                    <label class="control-label col-md-5">Total Unidades: </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      {!!Form::text('env',$envio->cantidad_enviada  ,['class'=> 'form-control', 'readonly'])!!}
                    </div>

                 
                </div>
                
              </div>
                  

                </div>
              </div>
             </div>


             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel ">
                  <div class="x_content">
                      <div>

                    
                        <div class="form-group">
                        <div class="col-md-12">
                          <div class="btn-group btn-group-justified">
                            <a href="#" class=" btn btn-primary btn-round">PAGINA ANTERIOR</a>
                            <a href="#" class="btn btn-warning btn-round">VER LA SOLICITUD DE ORIGEN </a> 
                            <a target="_blank" href="{{ route('envios.getPDF',$idd)}}" class="btn btn-success btn-round">IMPRIMIR </a> 
                          </div>  
                                               
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
              
@endsection

@section('scripts')
<script>

$(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

    $(document).ready(function() {
         //alert('1');
        $('#datatable1').DataTable({
          
             "language": {
            
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }

        },
            responsive: true

        });
    });

</script> 
@endsection
