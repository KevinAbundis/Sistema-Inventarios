@extends('admin.master')

@section('title','User Add')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>	Usuarios</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/user/add') }}"><i class="fas fa-plus-circle"></i>	Agregar Usuario</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus-circle"></i>	Agregar Usuario</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/user/add', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="name">Nombre(s): </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('name', null, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="lastname">Apellidos: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('lastname', null, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="email">Correo Electrónico: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::email('email', null, ['class' => 'form-control', 'required'])!!}
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
						{!!Form::select('user_type', getRoleUserArray('list', null), 0, ['class' => 'form-select'])!!}
					</div>
				</div>

				<div class="col-md-4">
					<label for="user_status">Estado: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::select('user_status', getUserStatusArray('list', null), 1, ['class' => 'form-select'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="password">Contraseña:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::password('password', ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

			</div>


			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Agregar Usuario', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection