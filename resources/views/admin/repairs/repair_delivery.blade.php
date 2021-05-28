@extends('admin.master')

@section('title','Repair Delivery')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/repairs/all') }}"><i class="fas fa-tools"></i>	Reparación de Equipos de Cómputo</a></a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/repair/'.$repair->id.'/delivery') }}"><i class="fas fa-calendar-check"></i>	Registrar Entrega de Reparación</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-calendar-check"></i>	Registrar Entrega de Reparación</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/repair/'.$repair->id.'/delivery', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Fecha_Entrega">Fecha de Entrega:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Entrega', \Carbon\Carbon::now(), ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Firma_Entrega">Persona Firma Entrega:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Firma_Entrega', null, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Estado_Entrega">Estado del Equipo en Entrega:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::text('Estado_Entrega', null, ['class' => 'form-control', 'required'])!!}
						</div>
				</div>
			</div>

			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Registrar Entrega', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection