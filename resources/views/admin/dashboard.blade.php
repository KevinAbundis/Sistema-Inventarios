@extends('admin.master')

@section('title','Dashboard')

@section('content')
<div class="container-fluid">
	{{-- <div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-chart-bar"></i>	Estadísticas rápidas</h2>
		</div>
	</div> --}}

	<div class="row mtop16">
		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-users"></i>	Usuarios</h2>
				</div>
				<div class="inside">
					<div class="big_count">{{ $users }}</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-tablet"></i>	CPU's</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>


		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-desktop"></i>	Monitores</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-keyboard"></i>	Teclados</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row mtop16">
		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-mouse"></i>	Ratones</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-print"></i>	Impresoras</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>

		{{-- <div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-tint"></i>	Toners</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div> --}}

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-phone-alt"></i>	Telefonos</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-hdd"></i>	Switches</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row mtop16">
		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-wifi"></i>	Modems</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>


		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-server"></i>	Otros Equipos</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-tools"></i>	Equipos en Reparación</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel shadow">
				<div class="header">
					<h2 class="title"><i class="fas fa-toolbox"></i>	Próximos Mantenimientos</h2>
				</div>
				<div class="inside">
					<div class="big_count">0</div>
				</div>
			</div>
		</div>

	</div>

</div>
@endsection