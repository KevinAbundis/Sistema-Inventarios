@extends('admin.master')

@section('title','Repairs')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/repairs/all') }}"><i class="fas fa-tools"></i>	Reparación de Equipos de Cómputo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-tools"></i>	Reparación de Equipos de Cómputo</h2>
			<ul>
				@if(kvfj(Auth::user()->permissions, 'repair_output'))
				<li>
					<a href="{{ url('/admin/repair/output') }}">
						<i class="fas fa-external-link-square-alt"></i>	Enviar Equipo a Reparación
					</a>
				</li>
				@endif
				<li>
					<a href="#"> Filtrar <i class="fas fa-angle-down"></i></a>
					<ul class="shadow">
						<li><a href="{{ url('/admin/repairs/all') }}"><i class="fas fa-stream"></i> Todos</a></li>
						<li><a href="{{ url('/admin/repairs/1') }}"><i class="fas fa-check-circle"></i>	Entregados</a></li>
						<li><a href="{{ url('/admin/repairs/0') }}"><i class="fas fa-times-circle"></i> Sin Entregar</a></li>
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
								<td>Fecha Salida</td>
								<td>Firma Salida</td>
								<td>Motivo Salida</td>
								<td>Fecha Entrega</td>
								<td>Firma Entrega</td>
								<td>Estado Entrega</td>
								{{-- <td>Entrega Usuario</td> --}}
								<td>Service Tag</td>
								<td>Service Code</td>
								<td>Lugar de Salida</td>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($repairs as $repair)
							<tr>
								<td>{{ $repair->id }}</td>
								<td>{{ $repair->Descripcion }}</td>
								<td>{{ $repair->Serie_Equipo }}</td>
								<td>{{ $repair->Marca }}</td>
								<td>{{ $repair->Modelo }}</td>
								<td>{{ $repair->Sucursal }}</td>
								<td>{{ $repair->Departamento }}</td>
								<td>{{ $repair->Ubicacion }}</td>
								<td>{{ date('d-m-Y', strtotime($repair->Fecha_Salida))  }}</td>
								<td>{{ $repair->Firma_Salida }}</td>
								<td>{{ $repair->Motivo_Salida }}</td>
								<td>
									@if(is_null($repair->Fecha_Entrega))
										{{ $repair->Fecha_Entrega }}
									@else
										{{ date('d-m-Y', strtotime($repair->Fecha_Entrega)) }}
									@endif
								</td>
								<td>{{ $repair->Firma_Entrega }}</td>
								<td>{{ $repair->Estado_Entrega }}</td>
								{{-- <td>{{ $repair->Fecha_Entrega_Usuario }}</td> --}}
								<td>{{ $repair->Service_Tag }}</td>
								<td>{{ $repair->Service_Code }}</td>
								<td>{{ $repair->Lugar_Salida }}</td>
								<td>
									<div class="opts">
										@if(kvfj(Auth::user()->permissions, 'repair_edit'))
											@if(is_null($repair->Fecha_Entrega))
												<a href="{{ url('/admin/repair/'.$repair->id.'/delivery') }}" data-toggle="tooltip" data-placement="top" title="Registrar Entrega" style="margin-top: 5px; margin-bottom: 5px;">
													<i class="fas fa-calendar-check"></i>
												</a>
											@endif
										@endif

										@if(kvfj(Auth::user()->permissions, 'repair_edit'))
											<a href="{{ url('/admin/repair/'.$repair->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar" style="margin-top: 5px; margin-bottom: 5px;">
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