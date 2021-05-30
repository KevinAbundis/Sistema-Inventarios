@extends('admin.master')

@section('title','Maintenance Edit')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/maintenances/all') }}"><i class="fas fa-toolbox"></i>	Mantenimiento de Equipos de Cómputo</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/maintenance/'.$maintenance->id.'/edit') }}"><i class="fas fa-edit"></i>	Editar Mantenimiento de Equipo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-edit"></i>	Editar Mantenimiento de Equipo</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/maintenance/'.$maintenance->id.'/edit', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Serie_Equipo">Número de Serie: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Serie_Equipo',  $maintenance->Serie_Equipo, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Descripcion">Descripción: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Descripcion',  $maintenance->Descripcion, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Marca">Marca: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Marca',  $maintenance->Marca, ['class' => 'form-control'])!!}
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
									{!!Form::text('Modelo',  $maintenance->Modelo, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Sucursal">Sucursal: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Sucursal', [
		    							'Matriz' => 'Matriz',
		    							'Chilpancingo' => 'Chilpancingo',
		    							'Zihuatanejo' => 'Zihuatanejo',
		    							'Diamante' => 'Diamante',
		    							'Farallon' => 'Farallon',
		    							'BuickGMC_Acapulco' => 'BuickGMC_Acapulco',
		    							'BuickGMC_Chilpancingo' => 'BuickGMC_Chilpancingo'
		    							], $maintenance->Sucursal, ['class' => 'form-select'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Departamento">Departamento: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Departamento', [
		    							'Direccion' => 'Direccion',
		    							'Gerencia' => 'Gerencia',
										'Gerencia_Calidad' => 'Gerencia_Calidad',
		    							'Ventas' => 'Ventas',
										'Buick_GMC_Ventas' => 'Buick_GMC_Ventas',
										'Chevrolet_Ventas' => 'Chevrolet_Ventas',
										'Tesoreria' => 'Tesoreria',
										'GM_Financial' => 'GM_Financial',
		    							'Contabilidad' => 'Contabilidad',
										'Recursos_Humanos' => 'Recursos_Humanos',
										'BDC' => 'BDC',
										'BDC_Ventas' => 'BDC_Ventas',
										'Credito_Y_Cobranza' => 'Credito_Y_Cobranza',
		    							'SuAuto' => 'SuAuto',
		    							'CRM_PosVenta' => 'CRM_PosVenta',
		    							'Refacciones' => 'Refacciones',
		    							'Servicio' => 'Servicio',
										'Control' => 'Control',
		    							'Caja' => 'Caja',
										'Mercadotecnia' => 'Mercadotecnia',
		    							'Sistemas' => 'Sistemas',
		    							'Capacitacion' => 'Capacitacion',
										'Switch' => 'Switch',
										'Camaras' => 'Camaras',
		    							'Almacen' => 'Almacen',
		    							'Reparacion' => 'Reparacion',
										'Otros_Equipamentos' => 'Otros_Equipamentos',
		    							], $maintenance->Departamento, ['class' => 'form-select'])!!}
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
						{!!Form::text('Ubicacion', $maintenance->Ubicacion, ['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="Fecha_Programada">Fecha Programada:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Programada', $maintenance->Fecha_Programada, ['class' => 'form-control', 'required'])!!}
							</div>
				</div>

				<div class="col-md-4">
						<label for="Hora_Programada">Hora Programada:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::time('Hora_Programada', $maintenance->Hora_Programada, ['class' => 'form-control', 'required'])!!}
							</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-4">
						<label for="Fecha_Efectiva">Fecha Efectiva:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Efectiva', $maintenance->Fecha_Efectiva, ['class' => 'form-control', 'required'])!!}
							</div>
				</div>

				<div class="col-md-4">
						<label for="Hora_Efectiva">Hora Efectiva:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::time('Hora_Efectiva', $maintenance->Hora_Efectiva, ['class' => 'form-control', 'required'])!!}
							</div>
				</div>

				<div class="col-md-4">
					<label for="Tipo_Mantenimiento">Tipo de Mantenimiento: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Tipo_Mantenimiento', $maintenance->Tipo_Mantenimiento, ['class' => 'form-control'])!!}
					</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-4">
					<label for="Observaciones">Observaciones: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Observaciones', $maintenance->Observaciones, ['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="col-md-4">
					<label for="Realizo_Mantenimiento">Realizó Mantenimiento: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Realizo_Mantenimiento', $maintenance->Realizo_Mantenimiento, ['class' => 'form-control'])!!}
					</div>
				</div>
			</div>


			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Actualizar Mantenimiento', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection