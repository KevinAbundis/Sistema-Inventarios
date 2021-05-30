@extends('admin.master')

@section('title','Maintenance Executed')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/maintenances/all') }}"><i class="fas fa-toolbox"></i>	Mantenimiento de Equipos de Cómputo</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/maintenance/'.$maintenance->id.'/executed') }}"><i class="fas fa-calendar-check"></i>	Registrar Mantenimiento de Equipo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-calendar-check"></i>	Registrar Mantenimiento de Equipo</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/maintenance/'.$maintenance->id.'/executed', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Fecha_Efectiva">Fecha Efectiva:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Efectiva', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'])!!}
							</div>
				</div>

				<div class="col-md-4">
						<label for="Hora_Efectiva">Hora Efectiva:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::time('Hora_Efectiva', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'])!!}
							</div>
				</div>

				<div class="col-md-4">
					<label for="Tipo_Mantenimiento">Tipo de Mantenimiento: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Tipo_Mantenimiento', null, ['class' => 'form-control', 'required'])!!}
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
						{!!Form::text('Observaciones', null, ['class' => 'form-control', 'required'])!!}
					</div>
				</div>

				<div class="col-md-4">
					<label for="Realizo_Mantenimiento">Realizó Mantenimiento: </label>
					<div class="input-group">
						<span class="input-group-text" id="basic-addon1">
							<i class="fas fa-keyboard"></i>
						</span>
						{!!Form::text('Realizo_Mantenimiento', null, ['class' => 'form-control', 'required'])!!}
					</div>
				</div>
			</div>

			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Registrar Mantenimiento', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection