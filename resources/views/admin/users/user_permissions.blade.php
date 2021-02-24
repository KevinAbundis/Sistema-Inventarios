@extends('admin.master')

@section('title','User Edit')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users/all') }}"><i class="fas fa-user-friends"></i>	Usuarios</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/user/'.$u->id.'/permissions') }}"><i class="fas fa-user-cog"></i>	Permisos de Usuario: {{ $u->name }} {{ $u->lastname }} (ID: {{ $u->id }})</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
	<div class="header">
			<h2 class="title"><i class="fas fa-user-cog"></i>	Permisos de Usuario</h2>
	</div>

	<div class="page_user mtop16" style="margin-left: 8px; margin-right: 8px">
		<form action="{{ url('/admin/user/'.$u->id.'/permissions') }}" method="POST">
		@csrf

		<div class="row">

			@foreach(user_permissions() as $key => $value)
				<div class="col-md-4 d-flex mb16">
					<div class="panel shadow">
						<div class="header">
							<h2 class="title">{!! $value['icon'] !!}	{{ $value['title'] }}</h2>
						</div>

						<div class="inside">

							@foreach($value['keys'] as $k => $v)
							<div class="form-check">
								<input class="form-check-input" name="{{ $k }}" type="checkbox" value="true"  id="flexCheckDefault" @if(kvfj($u->permissions, $k)) checked @endif>
								<label class="form-check-label" for="flexCheckDefault">{{ $v }}</label>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			@endforeach

		</div>

		<div class="row">
			<div class="col-md-12">

					<div class="inside" style="padding-top: 10px; padding-bottom: 50px">
						<input type="submit" value="Guardar Permisos" class="btn btn-primary" style="float: right;">
					</div>

			</div>
		</div>
		</form>
	</div>
</div>
</div>
@endsection