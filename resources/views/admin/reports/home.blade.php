@extends('admin.master')

@section('title','Reports')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/reports/home') }}"><i class="fas fa-file-contract"></i>	Reportes</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-file-contract"></i>	Reportes</h2>
		</div>

		<div class="page_user mtop16" style="margin-left: 8px; margin-right: 8px">
			<div class="row">
				<div class="col-md-4 d-flex mb16">
					<div class="panel shadow">
						<div class="header">
							<a href="{{ url('/admin/report/inventory/data') }}">
								<h2 class="title"><i class="fas fa-file-invoice"></i>	Reporte Inventario de Equipos</h2>
							</a>
						</div>
						<div class="inside">
							<h6>Este reporte sirve para generar un EXCEL del inventario de los equipos.</h6>
						</div>
					</div>
				</div>


				<div class="col-md-4 d-flex mb16">
					<div class="panel shadow">
						<div class="header">
							<a href="{{ url('/admin/report/outputs/data') }}">
								<h2 class="title"><i class="fas fa-external-link-square-alt"></i> 	Reporte de Salidas de Equipos</h2>
							</a>
						</div>
						<div class="inside">
							<h6>Este reporte sirve para generar un PDF de la salida de los equipos.</h6>
						</div>
					</div>
				</div>

				<div class="col-md-4 d-flex mb16">
					<div class="panel shadow">
						<div class="header">
							<a href="{{ url('/admin/report/outputs/movements/data') }}">
								<h2 class="title"><i class="fas fa-external-link-square-alt"></i> 	Reporte Movimientos de Salidas</h2>
							</a>
						</div>
						<div class="inside">
							<h6>Este reporte sirve para generar un PDF de los movimientos de salidas de los equipos.</h6>
						</div>
					</div>
				</div>
			</div>


			<div class="row mtop16">
				<div class="col-md-4 d-flex mb16">
					<div class="panel shadow">
						<div class="header">
							<a href="{{ url('/admin/report/repairs/data') }}">
								<h2 class="title"><i class="fas fa-tools"></i>	Reporte Reparaciones de Equipos</h2>
							</a>
						</div>
						<div class="inside">
							<h6>Este reporte sirve para generar un PDF de las reparaciones realizadas a los equipos.</h6>
						</div>
					</div>
				</div>


				<div class="col-md-4 d-flex mb16">
					<div class="panel shadow">
						<div class="header">
							<a href="{{ url('/admin/report/maintenances/data') }}">
								<h2 class="title"><i class="fas fa-toolbox"></i>	Reporte Mantenimientos de Equipos</h2>
							</a>
						</div>
						<div class="inside">
							<h6>Este reporte sirve para generar un PDF de los mantenimientos realizados a los equipos.</h6>
						</div>
					</div>
				</div>

			</div>
	</div>
	</div>
</div>
@endsection