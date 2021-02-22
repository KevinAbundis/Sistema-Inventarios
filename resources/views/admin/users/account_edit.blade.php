@extends('admin.master')

@section('title','Account Edit')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>	Usuarios</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/account/edit') }}"><i class="fas fa-user-edit"></i>	Editar Perfil</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row mtop16">
		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-user"></i>  Editar Avatar</h2>
				</div>
				<div class="inside">
					<div class="edit_avatar">
						{!! Form::open(['url' => '/admin/account/edit/avatar', 'id' => 'form_avatar_change' ,'files' => true]) !!}
						<a href="#" id="btn_avatar_edit">
							<div class="overlay" id="avatar_change_overlay"><i class="fas fa-camera"></i></div>
							@if(is_null(Auth::user()->avatar))
							<img src="{{ url('/static/images/avatar.png') }}">
							@else
							<img src="{{ url('/uploads_users/'.Auth::id().'/av_'.Auth::user()->avatar) }}">
							@endif
						</a>
						{!! Form::file('avatar', ['id' => 'input_file_avatar', 'accept' => 'image/*', 'class' => 'form-control']) !!}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-lock"></i>  Cambiar Contraseña</h2>
				</div>
				<div class="inside">
					{!! Form::open(['url' => '/admin/account/edit/password']) !!}
					<div class="row">
						<div class="col-md-4">
							<label for="apassword">Contraseña Actual: </label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-keyboard"></i>
								</span>
								{!!Form::password('apassword',  ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<label for="password">Nueva Contraseña: </label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-keyboard"></i>
								</span>
								{!!Form::password('password',  ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<label for="cpassword">Confirmar Nueva Contraseña: </label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-keyboard"></i>
								</span>
								{!!Form::password('cpassword',  ['class' => 'form-control'])!!}
							</div>
						</div>
					</div>



					<div class="row mtop32">
						<div class="col-md-12">
							{!!Form::submit('Actualizar Contraseña', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
						</div>
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>


	<div class="row mtop16">

		<div class="col-md-12">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-address-card"></i>  Editar Información</h2>
				</div>
				<div class="inside">
					{!! Form::open(['url' => '/admin/account/edit/info']) !!}

					<div class="row">
						<div class="col-md-4">
							<label for="name">Nombre(s): </label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-keyboard"></i>
								</span>
								{!!Form::text('name', Auth::user()->name, ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<label for="lastname">Apellidos: </label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-keyboard"></i>
								</span>
								{!!Form::text('lastname', Auth::user()->lastname, ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="col-md-4">
							<label for="email">Correo Electrónico: </label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-keyboard"></i>
								</span>
								{!!Form::text('email', Auth::user()->email, ['class' => 'form-control', 'disabled'])!!}
							</div>
						</div>
					</div>


					<div class="row mtop32">
						<div class="col-md-12">
							{!!Form::submit('Actualizar Información', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection