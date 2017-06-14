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
                          <th>Chassis</th>
                          <th>Fecha de Envio</th>
                          <th>Fecha est. arribo</th>
                          <th>Estado</th>
                          
                        </tr>
                      </thead>
                        
                      <tbody>
                        @foreach($det_all as $dets)
                        <tr>
                        <td>{{ $dets -> ITEM }}</td>
                        <td>{{ $dets -> vehiculo -> MARCA }}</td>
                        <td>{{ $dets -> vehiculo -> MODELO }}</td>
                        <td>{{ $dets -> vehiculo -> MASTER }}</td>
                        <td>{{ $dets -> vehiculo -> ANIO_MOD }}</td>
                        <td>{{ $dets -> vehiculo -> COLOR_EXTERNO }}</td>
                        <td>{{ $dets -> vehiculo -> COLOR_INTERNO }}</td>
                        <td>{{ $dets -> chassis }}</td>
                        <td> @if(is_null($dets -> fecha_envio)) --- @else{{ date('d-m-Y',strtotime($dets -> fecha_envio)) }} @endif</td>
                        <td>@if(is_null($dets -> fecha_envio)) --- @else {{ date('d-m-Y',strtotime($dets -> fecha_estimada_arribo)) }}@endif</td>
                        <td>
                        @if( $dets -> estado == 1)Reservado @endif
                        @if( $dets -> estado == 2)Aprobado @endif
                        @if( $dets -> estado == 3)Enviado @endif
                        @if( $dets -> estado == 4)Entregado @endif

                        </td>
                         </tr>                 
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
             </div>
            </div>
              
@endsection

@section('scripts')
<script>

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
