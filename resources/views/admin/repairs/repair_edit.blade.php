@extends('admin.master')

@section('title','Repair Edit')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/repairs/all') }}"><i class="fas fa-tools"></i>	Reparación de Equipos de Cómputo</a></a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/repair/'.$repair->id.'/edit') }}"><i class="fas fa-edit"></i>	Editar Reparación de Equipo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-external-link-square-alt"></i>	Enviar Equipo a Reparación</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/repair/output', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Serie_Equipo">Número de Serie: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Serie_Equipo',  $repair->Serie_Equipo, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Descripcion">Descripción: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Descripcion',  $repair->Descripcion, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Marca">Marca: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Marca',  $repair->Marca, ['class' => 'form-control'])!!}
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
									{!!Form::text('Modelo',  $repair->Modelo, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Service_Tag">Service Tag: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Service_Tag',  $repair->Service_Tag, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Service_Code">Service Code: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Service_Code',  $repair->Service_Code, ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">
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
		    							], $repair->Sucursal, ['class' => 'form-select'])!!}
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
		    							], $repair->Departamento, ['class' => 'form-select'])!!}
						</div>
				</div>

				<div class="col-md-4">
					<label for="Ubicacion">Ubicación: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Ubicacion', $repair->Ubicacion, ['class' => 'form-control'])!!}
					</div>
				</div>
			</div>


			<div class="row mtop16">
				<div class="col-md-4">
						<label for="Fecha_Salida">Fecha de Salida:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Salida', $repair->Fecha_Salida, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Firma_Salida">Persona Firma Salida:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Firma_Salida', $repair->Firma_Salida, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Motivo_Salida">Motivo Salida:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Motivo_Salida', $repair->Motivo_Salida, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-4">
						<label for="Lugar_Salida">Lugar Salida:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Lugar_Salida', $repair->Lugar_Salida, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Fecha_Entrega">Fecha de Entrega:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Entrega', $repair->Fecha_Entrega, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Firma_Entrega">Persona Firma Entrega:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Firma_Entrega', $repair->Firma_Entrega, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-4">
						<label for="Estado_Entrega">Estado del Equipo en Entrega:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Estado_Entrega', $repair->Estado_Entrega, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>
			</div>


			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Actualizar Reparación', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection