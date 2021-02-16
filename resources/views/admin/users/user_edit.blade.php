@extends('admin.master')

@section('title','User Edit')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>	Usuarios</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/user/'.$user->id.'/edit') }}"><i class="fas fa-edit"></i>	Editar Usuario</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-edit"></i>	Editar Usuario</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/user/'.$user->id.'/edit', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="name">Nombre(s): </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('name', $user->name, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="lastname">Apellidos: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('lastname', $user->lastname, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="email">Correo Electrónico: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::email('email', $user->email, ['class' => 'form-control'])!!}
						</div>
				</div>

			</div>

			<div class="row mtop16">

				<div class="col-md-4">
					<label for="user_type">Tipo de Usuario: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::select('user_type', getRoleUserArray('list', null), $user->role, ['class' => 'form-select'])!!}
					</div>
				</div>

				<div class="col-md-4">
					<label for="user_status">Estado: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::select('user_status', getUserStatusArray('list', null), $user->status, ['class' => 'form-select'])!!}
					</div>
				</div>

			</div>


			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection