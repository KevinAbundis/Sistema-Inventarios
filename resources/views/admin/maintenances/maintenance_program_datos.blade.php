@extends('admin.master')

@section('title','Maintenance Program')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/maintenances/all') }}"><i class="fas fa-toolbox"></i>	Mantenimiento de Equipos de Cómputo</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/maintenance/program') }}"><i class="fas fa-calendar-plus"></i>	Programar Mantenimiento de Equipo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-calendar-plus"></i>	Programar Mantenimiento de Equipo</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/maintenance/program', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Serie_Equipo">Número de Serie: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									@foreach ($equipments as $equipment)
									{!!Form::text('Serie_Equipo_M',  $equipment->Serie_Equipo, ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
									@endforeach
						</div>
				</div>

				<div class="col-md-4">
						<label for="Descripcion">Descripción: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									@foreach ($equipments as $equipment)
									{!!Form::text('Descripcion',  $equipment->Tipo_Hardware, ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
									@endforeach
						</div>
				</div>

				<div class="col-md-4">
						<label for="Marca">Marca: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									@foreach ($equipments as $equipment)
									{!!Form::text('Marca',  $equipment->Marca, ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
									@endforeach
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
									@foreach ($equipments as $equipment)
									{!!Form::text('Modelo',  $equipment->Modelo, ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
									@endforeach
						</div>
				</div>

				<div class="col-md-4">
						<label for="Sucursal">Sucursal: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						@foreach ($equipments as $equipment)
		    						{!!Form::select('Sucursal', [
		    							'Matriz' => 'Matriz',
		    							'Chilpancingo' => 'Chilpancingo',
		    							'Zihuatanejo' => 'Zihuatanejo',
		    							'Diamante' => 'Diamante',
		    							'Farallon' => 'Farallon',
		    							'BuickGMC_Acapulco' => 'BuickGMC_Acapulco',
		    							'BuickGMC_Chilpancingo' => 'BuickGMC_Chilpancingo'
		    							], $equipment->Sucursal, ['class' => 'form-select', 'style' => 'background-color: #eeeeee;'])!!}
									@endforeach
						</div>
				</div>

				<div class="col-md-4">
						<label for="Departamento">Departamento: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						@foreach ($equipments as $equipment)
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
		    							], $equipment->Departamento, ['class' => 'form-select', 'style' => 'background-color: #eeeeee;'])!!}
		    							@endforeach
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
						@foreach ($equipments as $equipment)
						{!!Form::text('Ubicacion', $equipment->Ubicacion, ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
						@endforeach
					</div>
				</div>

				<div class="col-md-4">
						<label for="Fecha_Programada">Fecha Programada:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Programada', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'])!!}
							</div>
				</div>

				<div class="col-md-4">
						<label for="Hora_Programada">Hora Programada:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::time('Hora_Programada', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'])!!}
							</div>
				</div>
			</div>

			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Programar Mantenimiento', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection