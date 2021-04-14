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
			<ul>
				<li>
					<a href="#" id="btn_search">
						<i class="fas fa-plus-circle"></i> Agregar Características
					</a>
				</li>
			</ul>
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
						<label for="Sucursal">Sucursal: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Sucursal', ['Matriz' => 'Matriz', 'Chilpancingo' => 'Chilpancingo', 'Zihuatanejo' => 'Zihuatanejo', 'Diamante' => 'Diamante', 'Farallon' => 'Farallon', 'BuickGMC_Acapulco' => 'BuickGMC_Acapulco', 'BuickGMC_Chilpancingo' => 'BuickGMC_Chilpancingo'], 0, ['class' => 'form-select'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Departamento">Departamento: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Departamento', ['Gerencia' => 'Gerencia', 'Ventas' => 'Ventas', 'Contabilidad' => 'Contabilidad', 'BDC_Ventas' => 'BDC_Ventas', 'SuAuto' => 'SuAuto', 'CRM_PosVenta' => 'CRM_PosVenta', 'Refacciones' => 'Refacciones', 'Servicio' => 'Servicio', 'Caja' => 'Caja', 'Sistemas' => 'Sistemas', 'Capacitacion' => 'Capacitacion', 'Otros_Equipamentos' => 'Otros_Equipamentos', 'Almacen' => 'Almacen', 'Reparacion' => 'Reparacion'], 0, ['class' => 'form-select'])!!}

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
						{!!Form::text('Ubicacion', null, ['class' => 'form-control', 'required'])!!}

					</div>
				</div>

				<div class="col-md-4">
					<label for="Tipo_Hardware">Tipo de Hardware: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::select('Tipo_Hardware', ['CPU' => 'CPU', 'Monitor' => 'Monitor', 'Teclado' => 'Teclado', 'Raton' => 'Raton', 'Impresora' => 'Impresora', 'Telefono' => 'Telefono', 'Switch' => 'Switch', 'Modem' => 'Modem', 'Laptop' => 'Laptop', 'Otro_Equipo' => 'Otro_Equipo'], 0, ['class' => 'form-select', 'onclick' => 'ShowSelected();', 'id' => 'producto'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="Marca">Marca:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Marca', null, ['class' => 'form-control', 'required'])!!}
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


			<div class="form_search" id="form_search" style="display: none">
			<div class="row mtop16">
				<div class="col-md-4">
						<label for="Procesador">Procesador: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Procesador', null, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Velocidad_Procesador">Velocidad Procesador: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::text('Velocidad_Procesador', null, ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Memoria_RAM">Memoria RAM: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    					{!!Form::text('Memoria_RAM', null, ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-4">
					<label for="Capacidad_DiscoDuro">Capacidad DiscoDuro: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Capacidad_DiscoDuro', null, ['class' => 'form-control'])!!}

					</div>
				</div>

				<div class="col-md-4">
					<label for="Sistema_Operativo">Sistema Operativo: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Sistema_Operativo', null, ['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="ESET32">ESET32:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('ESET32', null, ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>


		<div class="row mtop16">

				<div class="col-md-4">
					<label for="Office">Office: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Office', null, ['class' => 'form-control'])!!}

					</div>
				</div>

				<div class="col-md-4">
					<label for="Service_Tag">Service Tag: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Service_Tag', null, ['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="Service_Code">Service Code:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Service_Code', null, ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-4">
					<label for="IP">IP: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('IP', null, ['class' => 'form-control'])!!}

					</div>
				</div>

				<div class="col-md-4">
					<label for="Usuario">Usuario: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Usuario', null, ['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="Contrasenia_CPU">Contraseña CPU:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Contrasenia_CPU', null, ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-4">
					<label for="Remoto">Remoto: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Remoto', null, ['class' => 'form-control'])!!}

					</div>
				</div>

				<div class="col-md-4">
					<label for="Contrasenia_Remoto">Contraseña Remoto: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Contrasenia_Remoto', null, ['class' => 'form-control'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="Serie_Raton">Serie Raton:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Serie_Raton', null, ['class' => 'form-control'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop16">

				<div class="col-md-4">
					<label for="Serie_Teclado">Serie Teclado: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Serie_Teclado', null, ['class' => 'form-control'])!!}

					</div>
				</div>

				<div class="col-md-4">
					<label for="Serie_Monitor">Serie Monitor: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Serie_Monitor', null, ['class' => 'form-control'])!!}
					</div>
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



	{{-- <div class="form_search" id="form_search" style="display: none">
	<div class="panel shadow mtop16">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus-circle"></i>	Agregar Caracteristicas</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/features/add', 'files' => true]) !!}
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
						<label for="Sucursal">Sucursal: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Sucursal', ['Matriz' => 'Matriz', 'Chilpancingo' => 'Chilpancingo', 'Zihuatanejo' => 'Zihuatanejo', 'Diamante' => 'Diamante', 'Farallon' => 'Farallon', 'BuickGMC_Acapulco' => 'BuickGMC_Acapulco', 'BuickGMC_Chilpancingo' => 'BuickGMC_Chilpancingo'], 0, ['class' => 'form-select'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Departamento">Departamento: </label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
		    						{!!Form::select('Departamento', ['Gerencia' => 'Gerencia', 'Ventas' => 'Ventas', 'Contabilidad' => 'Contabilidad', 'BDC_Ventas' => 'BDC_Ventas', 'SuAuto' => 'SuAuto', 'CRM_PosVenta' => 'CRM_PosVenta', 'Refacciones' => 'Refacciones', 'Servicio' => 'Servicio', 'Caja' => 'Caja', 'Sistemas' => 'Sistemas', 'Capacitacion' => 'Capacitacion', 'Otros_Equipamentos' => 'Otros_Equipamentos', 'Almacen' => 'Almacen', 'Reparacion' => 'Reparacion'], 0, ['class' => 'form-select'])!!}

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
						{!!Form::text('Ubicacion', null, ['class' => 'form-control', 'required'])!!}

					</div>
				</div>

				<div class="col-md-4">
					<label for="Tipo_Hardware">Tipo de Hardware: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::select('Tipo_Hardware', ['CPU' => 'CPU', 'Monitor' => 'Monitor', 'Teclado' => 'Teclado', 'Raton' => 'Raton', 'Impresora' => 'Impresora', 'Telefono' => 'Telefono', 'Switch' => 'Switch', 'Modem' => 'Modem', 'Laptop' => 'Laptop', 'Otro_Equipo' => 'Otro_Equipo'], 0, ['class' => 'form-select', 'onclick' => 'ShowSelected();', 'id' => 'producto'])!!}
					</div>
				</div>

				<div class="col-md-4">
						<label for="Marca">Marca:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
							{!!Form::text('Marca', null, ['class' => 'form-control', 'required'])!!}
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
</div> --}}


	{{-- <div id="insertHTML">
		<div class="form_search" id="form_search" style="display: none">
				{!! Form::open(['url' => '/admin/user/search']) !!}
				<div class="row">

					<div class="col-md-7">
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1">
								<i class="fas fa-keyboard"></i>
							</span>
							{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su búsqueda', 'required']) !!}
						</div>
					</div>

					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-text" id="basic-addon1">
								<i class="fas fa-keyboard"></i>
							</span>
							{!! Form::select('filter', ['0' => 'Nombre', '1' => 'Apellido'], 0, ['class' => 'form-select']) !!}
						</div>
					</div>

					<div class="col-md-2">
						{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
	</div> --}}

</div>
@endsection

