@extends('admin.master')

@section('title','Equipments')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipments/all') }}"><i class="fas fa-user-friends"></i>	Equipos de Cómputo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-boxes"></i>	Equipos de Cómputo</h2>
			<ul>
				{{-- @if(kvfj(Auth::user()->permissions, 'user_add')) --}}
				<li>
					<a href="{{ url('/admin/equipment/add') }}">
						<i class="fas fa-plus-circle"></i>  Agregar Equipo
					</a>
				</li>
				{{-- @endif --}}
				{{-- @if(kvfj(Auth::user()->permissions, 'user_add')) --}}
				<li>
					<a href="{{ url('/admin/equipment/output') }}">
						<i class="fas fa-external-link-square-alt"></i>  Realizar Salida
					</a>
				</li>
				{{-- @endif --}}
				{{-- @if(kvfj(Auth::user()->permissions, 'user_add')) --}}
				<li>
					<a href="{{ url('/admin/equipment/PONER_ALGO') }}">
						<i class="fas fa-toolbox"></i>  Programar Mantenimiento
					</a>
				</li>
				{{-- @endif --}}
				{{-- @if(kvfj(Auth::user()->permissions, 'user_add')) --}}
				<li>
					<a href="{{ url('/admin/equipment/PONER_ALGO') }}">
						<i class="fas fa-tools"></i>  Mandar a Reparación
					</a>
				</li>
				{{-- @endif --}}
				<li>
					<a href="#"> Filtrar <i class="fas fa-angle-down"></i></a>
					<ul class="shadow">
						<li><a href="{{ url('/admin/equipments/all') }}"><i class="fas fa-stream"></i> Todos</a></li>
						<li><a href="{{ url('/admin/equipments/CPU') }}"><i class="fas fa-tablet"></i> CPU's</a></li>
						<li><a href="{{ url('/admin/equipments/Monitor') }}"><i class="fas fa-desktop"></i> Monitores</a></li>
						<li><a href="{{ url('/admin/equipments/Teclado') }}"><i class="fas fa-keyboard"></i> Teclados</a></li>
						<li><a href="{{ url('/admin/equipments/Raton') }}"><i class="fas fa-mouse"></i> Ratones</a></li>
						<li><a href="{{ url('/admin/equipments/Impresora') }}"><i class="fas fa-print"></i> Impresoras</a></li>
						<li><a href="{{ url('/admin/equipments/Telefono') }}"><i class="fas fa-phone-alt"></i> Telefonos</a></li>
						<li><a href="{{ url('/admin/equipments/Switch') }}"><i class="fas fa-hdd"></i> Switches</a></li>
						<li><a href="{{ url('/admin/equipments/Modem') }}"><i class="fas fa-wifi"></i> Modems</a></li>
						<li><a href="{{ url('/admin/equipments/Otros') }}"><i class="fas fa-server"></i> Otros Equipos</a></li>
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
								<td>Serie</td>
								<td>Sucursal</td>
								<td>Departamento</td>
								<td>Ubicación</td>
								<td>Tipo de Hardware</td>
								<td>Marca</td>
								<td>Modelo</td>
								<td>Descripción</td>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($equipments as $equipment)
							<tr>
								<td>{{ $equipment->Serie_Equipo }}</td>
								<td>{{ $equipment->Id_Sucursal }}</td>
								<td>{{ $equipment->Id_Departamento }}</td>
								<td>{{ $equipment->Id_Ubicacion }}</td>
								<td>{{ $equipment->Tipo_Hardware }}</td>
								<td>{{ $equipment->Marca }}</td>
								<td>{{ $equipment->Modelo }}</td>
								<td>{{ $equipment->Descripcion }}</td>
								<td>
									Falta poner las acciones
									{{-- <div class="opts">
										@if(kvfj(Auth::user()->permissions, 'user_edit'))
										<a href="{{ url('/admin/user/'.$equipment->Serie_Equipo.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
											<i class="fas fa-edit"></i>
										</a>
										@endif

										@if(kvfj(Auth::user()->permissions, 'user_permissions'))
										<a href="{{ url('/admin/user/'.$equipment->Serie_Equipo.'/permissions') }}" data-toggle="tooltip" data-placement="top" title="Permisos de Usuario">
											<i class="fas fa-user-cog"></i>
										</a>
										@endif
									</div> --}}
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