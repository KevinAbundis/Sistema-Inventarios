@extends('admin.master')

@section('title','Equipment Edit')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipments/all') }}"><i class="fas fa-boxes"></i>	Equipos de Cómputo</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipment/'.$equipment->id.'/edit') }}"><i class="fas fa-edit"></i>	Editar Equipo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-edit"></i>	Editar Equipo</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/equipment/'.$equipment->id.'/edit', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Serie_Equipo">Número de Serie: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Serie_Equipo',  $equipment->Serie_Equipo, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Sucursal">Sucursal: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Sucursal', ['Matriz' => 'Matriz', 'Chilpancingo' => 'Chilpancingo', 'Zihuatanejo' => 'Zihuatanejo', 'Diamante' => 'Diamante', 'Farallon' => 'Farallon', 'BuickGMC_Acapulco' => 'BuickGMC_Acapulco', 'BuickGMC_Chilpancingo' => 'BuickGMC_Chilpancingo'], $equipment->Sucursal, ['class' => 'form-select'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Departamento">Departamento: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Departamento', ['Gerencia' => 'Gerencia', 'Ventas' => 'Ventas', 'Contabilidad' => 'Contabilidad', 'BDC_Ventas' => 'BDC_Ventas', 'SuAuto' => 'SuAuto', 'CRM_PosVenta' => 'CRM_PosVenta', 'Refacciones' => 'Refacciones', 'Servicio' => 'Servicio', 'Caja' => 'Caja', 'Sistemas' => 'Sistemas', 'Capacitacion' => 'Capacitacion', 'Otros_Equipamentos' => 'Otros_Equipamentos', 'Almacen' => 'Almacen', 'Reparacion' => 'Reparacion'], $equipment->Departamento, ['class' => 'form-select'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-4">
					<label for="Ubicacion">Ubicación: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Ubicacion', $equipment->Ubicacion, ['class' => 'form-control', 'required'])!!}
					</div>
				</div>

				<div class="col-md-4">
					<label for="Tipo_Hardware">Tipo de Hardware: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::select('Tipo_Hardware', ['CPU' => 'CPU', 'Monitor' => 'Monitor', 'Teclado' => 'Teclado', 'Raton' => 'Raton', 'Impresora' => 'Impresora', 'Telefono' => 'Telefono', 'Switch' => 'Switch', 'Modem' => 'Modem', 'Laptop' => 'Laptop', 'Otro_Equipo' => 'Otro_Equipo'], $equipment->Tipo_Hardware, ['class' => 'form-select'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="Marca">Marca:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Marca', $equipment->Marca, ['class' => 'form-control', 'required'])!!}
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
									{!!Form::text('Modelo', $equipment->Modelo, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-8">
						<label for="Descripcion">Descripción: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::textarea('Descripcion', $equipment->Descripcion, ['class' => 'form-control', 'rows' => '5'])!!}
						</div>
				</div>
			</div>


			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Actualizar Equipo', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection