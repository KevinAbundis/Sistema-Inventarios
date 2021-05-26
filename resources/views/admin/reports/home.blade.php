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

				<div class="col-md-3 d-flex mb16">
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


				<div class="col-md-3 d-flex mb16">
					<div class="panel shadow">
						<div class="header">
							<a href="{{ url('/admin/report/outputs/data') }}">
								<h2 class="title"><i class="fas fa-external-link-square-alt"></i> 	Reporte Salidas de Equipos</h2>
							</a>
						</div>
						<div class="inside">
							<h6>Este reporte sirve para generar un PDF de la salida de los equipos.</h6>
						</div>
					</div>
				</div>

				<div class="col-md-3 d-flex mb16">
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
	</div>


	</div>
</div>
@endsection