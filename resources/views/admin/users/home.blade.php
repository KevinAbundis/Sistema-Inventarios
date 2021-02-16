@extends('admin.master')

@section('title','Users')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>	Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-user-friends"></i>	Usuarios</h2>
			<ul>
				@if(Auth::user()->role == "1")
				<li>
					<a href="{{ url('/admin/user/add') }}">
						<i class="fas fa-plus-circle"></i>	Agregar Usuario
					</a>
				</li>
				@endif
				{{-- <li>
					<a href="#" id="btn_search">
						<i class="fas fa-search"></i>	Buscar
					</a>
				</li> --}}
				{{-- <li>
					<a href="#"> Filtrar <i class="fas fa-angle-down"></i></a>
					<ul class="shadow">
						<li><a href="{{ url('/admin/users/all') }}"><i class="fas fa-stream"></i> Todos</a></li>
						<li><a href="{{ url('/admin/users/1') }}"><i class="fas fa-user-check"></i> Activos</a></li>
						<li><a href="{{ url('/admin/users/100') }}"><i class="fas fa-heart-broken"></i> Suspendidos</a></li>
					</ul>
				</li> --}}
			</ul>
		</div>

		<div class="inside">

			{{-- <div class="form_search" id="form_search">
				{!! Form::open(['url' => '/admin/user/search']) !!}
				<div class="row">

					<div class="col-md-7">
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1">
								<i class="fas fa-keyboard"></i>
							</span>
							{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su búsqueda', 'required']) !!}
						</div>
					</div>

					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1">
								<i class="fas fa-keyboard"></i>
							</span>
							{!! Form::select('filter', ['0' => 'Nombre', '1' => 'Apellido'], 0, ['class' => 'form-select']) !!}
						</div>
					</div>

					<div class="col-md-2">
						{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div> --}}


			{{-- Tabla mostrando información de usuarios --}}

			<div class="card">
				<div class="card-body">
					<table class="table table-striped" id="usuarios">
						<thead>
							<tr>
								<td>ID</td>
								<td>Avatar</td>
								<td>Nombre(s)</td>
								<td>Apellidos</td>
								<td>Correo Electrónico</td>
								<td>Tipo de Usuario</td>
								<td>Estado</td>
								{{-- <td>Fecha y Hora de Registro</td> --}}
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td width="50">
									@if(is_null($user->avatar))
									<img src="{{ url('/static/images/avatar.png') }}" class="img-fluid rounded-circle">
									@else
									<img src="{{ url('/uploads_users/'.$user->id.'/av_'.$user->avatar) }}" class="img-fluid rounded-circle">
									@endif
								</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->lastname }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ getRoleUserArray(null,$user->role) }}</td>
								<td>{{ getUserStatusArray(null,$user->status) }}</td>
								{{-- <td>{{ $user->created_at }}</td> --}}
								<td>
									<div class="opts">
										{{-- @if(kvfj(Auth::user()->permissions, 'user_edit')) --}}
										<a href="{{ url('/admin/user/'.$user->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
											<i class="fas fa-edit"></i>
										</a>
										{{-- @endif --}}

										{{-- @if(kvfj(Auth::user()->permissions, 'user_permissions')) --}}
										<a href="{{ url('/admin/user/'.$user->id.'/permissions') }}" data-toggle="tooltip" data-placement="top" title="Permisos de Usuario">
											<i class="fas fa-user-cog"></i>
										</a>
										{{-- @endif --}}

										{{-- @if(kvfj(Auth::user()->permissions, 'product_delete')) --}}
											{{-- @if(is_null($user->deleted_at))
												<a href="#" data-path="admin/product" data-action="delete" data-object="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn-deleted">
												<i class="fas fa-trash-alt"></i>
												</a>
											@else
												<a href="{{ url('/admin/user/'.$user->id.'/restore') }}" data-path="admin/product" data-action="restore" data-object="{{ $p->id }}" data-toggle="tooltip" data-placement="top" title="Restaurar" class="btn-deleted">
												<i class="fas fa-trash-restore"></i>
												</a>
											@endif --}}
										{{-- @endif --}}
									</div>
								</td>
							</tr>
							@endforeach
				{{-- <tr>
					<td colspan="7">{!! $users->render() !!}</td>
				</tr> --}}
			</tbody>
		</table>
	</div>
</div>

		</div>
	</div>
</div>
@endsection

@section('js')
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
            "info": "Mostrando la página _PAGE_ de _PAGES_",
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

