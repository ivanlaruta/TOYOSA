@extends('layouts.main')

@section('content')
        
  <div class="right_col" role="main">
          <div class="">
          <div class="page-title">
              <div class="title_left">
                <h3>ESTADO DE SOLICITUDES / <small>Lista de Solicitudes</small></h3>
              </div>

              
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>APROBADOS</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     
                    </p>

                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                     
                      <thead>
                        <tr>
                          <th>Solicitud</th>
                          <th>Origen</th>
                          <th>Destino</th>
                          <th>Tipo</th>
                          <th>Creacion</th>
                          <th>Aprobacion</th>
                          <th>Solicitud</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                        
                      <tbody>
                        @foreach($env_aprob as $envs2)
                        <tr @if($envs2 -> estado == '3') class="clickable-row danger" @endif
                            @if($envs2 -> estado == '4') class="clickable-row warning" @endif
                            @if($envs2 -> estado == '5') class="clickable-row info" @endif
                            @if($envs2 -> estado == '6') class="clickable-row success" @endif
                            id="clickable-row" data-href="{{ route('envios.detalle',$envs2-> id_solicitud )}}" >    

                          <td>{{ $envs2-> id_solicitud }}</td>
                          <td>{{ $envs2 -> origen }}</td>
                          <td>{{ $envs2 -> destino }}</td>
                          <td>{{ $envs2 -> tipo}}</td>
                          <td>{{ date('d-m-Y',strtotime($envs2 -> fecha_creacion)) }}</td>
                          <td>{{ date('d-m-Y',strtotime($envs2 -> fecha_aprobado)) }}</td>
                          <td>@if(is_null($envs2 -> fecha_envio)) --- @else {{ date('d-m-Y',strtotime($envs2 -> fecha_envio)) }}@endif</td>
                          <td>
                            @if($envs2 -> estado == '3')Sin enviar @endif
                            @if($envs2 -> estado == '4')Solicitud Incompleta @endif
                            @if($envs2 -> estado == '5')Solicitud completa @endif
                            @if($envs2 -> estado == '6')Finalizado @endif
                          </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div></div>
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
