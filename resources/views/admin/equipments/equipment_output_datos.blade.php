@extends('admin.master')

@section('title','Equipment Output')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipments/all') }}"><i class="fas fa-boxes"></i>	Equipos de Cómputo</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipment/output') }}"><i class="fas fa-external-link-square-alt"></i>  Realizar Salida</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-external-link-square-alt"></i>  Realizar Salida</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/equipment/output', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Serie_Equipo">Número de Serie: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						@foreach ($equipments as $equipment)
									{!!Form::text('Serie_Equipo',  $equipment->Serie_Equipo, ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
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
			</div>

			<div class="row mtop16">
				<div class="col-md-4">
						<label for="Service_Tag">Service Tag: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						@foreach ($cpufeatures as $cpufeature)
									{!!Form::text('Service_Tag',  $cpufeature->Service_Tag, ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
									@endforeach
						</div>
				</div>

				<div class="col-md-4">
						<label for="Service_Code">Service Code: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									@foreach ($cpufeatures as $cpufeature)
									{!!Form::text('Service_Code',  $cpufeature->Service_Code, ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
									@endforeach
						</div>
				</div>

				{{-- <div class="col-md-4">
						<label for="Sucursal_Entrega">Sucursal Origen: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						@foreach ($equipments as $equipment)
		    						{!!Form::select('Sucursal_Entrega', [
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
				</div> --}}

				<div class="col-md-4">
						<label for="Nombre_Usuario">Persona Realiza Salida:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Nombre_Usuario', Auth::user()->name." ".Auth::user()->lastname , ['class' => 'form-control', 'style' => 'background-color: #eeeeee;'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-4">
						<label for="Sucursal_Recibe">Sucursal Destino: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Sucursal_Recibe', [
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
						<label for="Departamento">Departamento Destino: </label>
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

				<div class="col-md-4">
					<label for="Ubicacion">Ubicación Destino: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Ubicacion', null, ['class' => 'form-control'])!!}
					</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-4">
					<label for="Descripcion">Descripción: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						@foreach ($equipments as $equipment)
							{!!Form::text('Descripcion',  $equipment->Tipo_Hardware, ['class' => 'form-control'])!!}
						@endforeach
					</div>
				</div>

				<div class="col-md-4">
						<label for="Fecha_Salida">Fecha Salida:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Salida', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'])!!}
						</div>
				</div>
			</div>


			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Realizar Salida', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection