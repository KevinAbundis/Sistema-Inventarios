@extends('admin.master')

@section('title','Report Maintenances')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/reports/home') }}"><i class="fas fa-file-contract"></i>	Reportes</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/report/maintenances/data') }}"><i class="fas fa-toolbox"></i>	Reporte Mantenimientos de Equipos</h2></a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-toolbox"></i>	Reporte Mantenimientos de Equipos</h2>
		</div>

		<div class="inside">
			{!!Form::open(['url' => '/admin/report/maintenances', 'files' => true]) !!}
			<div class="row">
				<div class="col-md-4">
						<label for="Fecha_Inicial">Fecha Inicial:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Inicial', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
						</div>
				</div>

				<div class="col-md-4">
						<label for="Fecha_Final">Fecha Final:</label>
							<div class="input-group">
		    						<span class="input-group-text" id="basic-addon1">
		    							<i class="fas fa-keyboard"></i>
		    						</span>
									{!!Form::date('Fecha_Final', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
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
		    							'BuickGMC_Chilpancingo' => 'BuickGMC_Chilpancingo',
		    							'Todas' => 'Todas',
		    							], 0, ['class' => 'form-select'])!!}
						</div>
				</div>
			</div>


			<div class="row mtop32">
				<div class="col-md-12">
					{!!Form::submit('Generar Documento', ['class' => 'btn btn-primary', 'style' => 'float: right'])!!}
				</div>
			</div>


			{!!Form::close()!!}
		</div>
	</div>

	</div>

</div>
@endsection