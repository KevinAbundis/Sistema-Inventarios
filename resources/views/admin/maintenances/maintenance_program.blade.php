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
									{{-- El id es el que provoca que se haga el cambio mediante javascript --}}
		    							<select name="Serie_Equipo" id="Serie_Equipo_M" class="form-select">
		    								<option value="0">Selecciona Número de Serie ...</option>
		    								@foreach ($equipments as $equipment)
			    								<option value="{{ $equipment->Serie_Equipo }}">
			    									{{ $equipment->Serie_Equipo }}
			    								</option>
		    								@endforeach
		    							</select>
						</div>
				</div>

				<div class="col-md-4">
						<label for="Descripcion">Descripción: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Descripcion',  null, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Marca">Marca: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Marca',  null, ['class' => 'form-control'])!!}
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
									{!!Form::text('Modelo',  null, ['class' => 'form-control'])!!}
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
		    							], 0, ['class' => 'form-select'])!!}
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
		    							], 0, ['class' => 'form-select'])!!}
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
						{!!Form::text('Ubicacion', null, ['class' => 'form-control'])!!}
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