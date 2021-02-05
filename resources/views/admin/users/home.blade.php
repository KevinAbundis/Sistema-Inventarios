@extends('admin.master')

@section('title','Users')

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
				{{-- @if(kvfj(Auth::user()->permissions, 'product_add')) --}}
				<li>
					<a href="{{ url('/admin/user/add') }}">
						<i class="fas fa-plus-circle"></i>	Agregar Usuario
					</a>
				</li>
				{{-- @endif --}}
				<li>
					<a href="#"> Filtrar <i class="fas fa-angle-down"></i></a>
					<ul class="shadow">
						<li><a href="{{ url('/admin/users/all') }}"><i class="fas fa-stream"></i> Todos</a></li>
						<li><a href="{{ url('/admin/users/1') }}"><i class="fas fa-user-check"></i> Activos</a></li>
						<li><a href="{{ url('/admin/users/100') }}"><i class="fas fa-heart-broken"></i> Inactivos</a></li>
					</ul>
				</li>
				<li>
					<a href="#" id="btn_search">
						<i class="fas fa-search"></i>	Buscar
					</a>
				</li>
			</ul>
		</div>

		<div class="inside">
			{{-- Formulario de búsqueda --}}
			<div class="form_search" id="form_search">
				{!! Form::open(['url' => '/admin/product/search']) !!}
				<div class="row">
					<div class="col-md-8">
						{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su búsqueda', 'required']) !!}
					</div>
					<div class="col-md-2">
						{!! Form::select('filter', ['0' => 'Nombre', '1' => 'Apellido'], 0, ['class' => 'form-control']) !!}
					</div>

					<div class="col-md-2">
						{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>

			{{-- Tabla mostrando información de usuarios --}}
			<table class="table mtop16">
				<thead>
					<tr>
						<td>ID</td>
						<td>Avatar</td>
						<td>Nombre(s)</td>
						<td>Apellidos</td>
						<td>Correo Electrónico</td>
						<td>Tipo de Usuario</td>
						<td>Estado</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td width="70">
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
							</div>
						</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="7">{!! $users->render() !!}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection