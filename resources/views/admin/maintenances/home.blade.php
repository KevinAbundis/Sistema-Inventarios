@extends('admin.master')

@section('title','Maintenances')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/maintenances/all') }}"><i class="fas fa-toolbox"></i>	Mantenimiento de Equipos de Cómputo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-toolbox"></i>	Mantenimiento de Equipos de Cómputo</h2>
			<ul>
				@if(kvfj(Auth::user()->permissions, 'maintenance_program'))
				<li>
					<a href="{{ url('/admin/maintenance/program') }}">
						<i class="fas fa-calendar-plus"></i>	Programar Mantenimiento de Equipo
					</a>
				</li>
				@endif
				<li>
					<a href="#"> Filtrar <i class="fas fa-angle-down"></i></a>
					<ul class="shadow">
						<li><a href="{{ url('/admin/maintenances/all') }}"><i class="fas fa-stream"></i> Todos</a></li>
						<li><a href="{{ url('/admin/maintenances/1') }}"><i class="fas fa-check-circle"></i> Realizados</a></li>
						<li><a href="{{ url('/admin/maintenances/0') }}"><i class="fas fa-times-circle"></i> Sin Realizar</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="inside">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped" id="usuarios">
						<thead>
							<tr>
								<td>ID</td>
								<td>Descripción</td>
								<td>Serie</td>
								<td>Marca</td>
								<td>Modelo</td>
								<td>Sucursal</td>
								<td>Departamento</td>
								<td>Ubicación</td>
								<td>Fecha Programada</td>
								<td>Hora Programada</td>
								<td>Fecha Efectiva</td>
								<td>Hora Efectiva</td>
								<td>Realizo Mantenimiento</td>
								<td>Tipo Mantenimiento</td>
								<td>Observaciones</td>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($maintenances as $maintenance)
							<tr>
								<td>{{ $maintenance->id }}</td>
								<td>{{ $maintenance->Descripcion }}</td>
								<td>{{ $maintenance->Serie_Equipo }}</td>
								<td>{{ $maintenance->Marca }}</td>
								<td>{{ $maintenance->Modelo }}</td>
								<td>{{ $maintenance->Sucursal }}</td>
								<td>{{ $maintenance->Departamento }}</td>
								<td>{{ $maintenance->Ubicacion }}</td>
								<td>{{ date('d-m-Y', strtotime($maintenance->Fecha_Programada))  }}</td>
								<td>{{ $maintenance->Hora_Programada }}</td>
								<td>
									@if(is_null($maintenance->Fecha_Efectiva))
										{{ $maintenance->Fecha_Efectiva }}
									@else
										{{ date('d-m-Y', strtotime($maintenance->Fecha_Efectiva)) }}
									@endif
								</td>
								<td>{{ $maintenance->Hora_Efectiva }}</td>
								<td>{{ $maintenance->Realizo_Mantenimiento }}</td>
								<td>{{ $maintenance->Tipo_Mantenimiento }}</td>
								<td>{{ $maintenance->Observaciones }}</td>
								<td>
									<div class="opts">
										@if(kvfj(Auth::user()->permissions, 'maintenance_edit'))
											@if(is_null($maintenance->Fecha_Efectiva))
												<a href="{{ url('/admin/maintenance/'.$maintenance->id.'/executed') }}" data-toggle="tooltip" data-placement="top" title="Registrar Mantenimiento" style="margin-top: 5px; margin-bottom: 5px;">
													<i class="fas fa-calendar-check"></i>
												</a>
											@endif
										@endif

										@if(kvfj(Auth::user()->permissions, 'maintenance_edit'))
											<a href="{{ url('/admin/maintenance/'.$maintenance->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar" style="margin-top: 5px; margin-bottom: 5px;">
												<i class="fas fa-edit"></i>
											</a>
										@endif
									</div>
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
@endsection

@section('js')
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
	<script>
		 $('#usuarios').DataTable({
		 	responsive: true,
		 	autoWidth: false,
		 	processing: true,
		 	serverSider: true,
		 	"language": {
            "lengthMenu": "Mostrar " +
            			   '<select class="custom-select  form-control" style="width: 85px;"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="-1">Todos</option></select>' +
            			   " registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Registros no disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
            	"next": "Siguiente",
            	"previous": "Anterior"
            }
        }
		 });
	</script>
@endsection