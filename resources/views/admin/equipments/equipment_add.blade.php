@extends('admin.master')

@section('title','Equipment Add')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipments/all') }}"><i class="fas fa-boxes"></i>	Equipos de Cómputo</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipment/add') }}"><i class="fas fa-plus-circle"></i>	Agregar Equipo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus-circle"></i>	Agregar Equipo</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/equipment/add', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Serie_Equipo">Número de Serie: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Serie_Equipo', null, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Id_Sucursal">Sucursal: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Id_Sucursal', null, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Id_Departamento">Departamento: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Id_Departamento', null, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-4">
					<label for="Id_Ubicacion">Ubicación: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Id_Ubicacion', null, ['class' => 'form-control', 'required'])!!}
					</div>
				</div>

				<div class="col-md-4">
					<label for="Tipo_Hardware">Tipo de Hardware: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Tipo_Hardware', null, ['class' => 'form-control', 'required'])!!}
						{{-- {!!Form::select('Tipo_Hardware', getKindOfEquipmentArray('list', null), 0, ['class' => 'form-select'])!!} --}}
					</div>
				</div>

				<div class="col-md-4">
						<label for="Marca">Marca:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Marca', null, ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-4">
						<label for="Modelo">Modelo: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Modelo', null, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-8">
						<label for="Descripcion">Descripción: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::textarea('Descripcion', null, ['class' => 'form-control', 'rows' => '5'])!!}
						</div>
				</div>
			</div>


			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Agregar Equipo', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection