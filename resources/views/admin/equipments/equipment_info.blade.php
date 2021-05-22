@extends('admin.master')

@section('title','Equipment Information')

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipments/all') }}"><i class="fas fa-boxes"></i>	Equipos de Cómputo</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ url('/admin/equipment/'.$equipment->id.'/info') }}"><i class="fas fa-info-circle"></i>	Características del Equipo de Cómputo</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-info-circle"></i>	Características del Equipo de Cómputo</h2>
			<ul>
				{{-- @if(kvfj(Auth::user()->permissions, 'equipment_add')) --}}
				<li>
					@foreach($cpufeatures as $cpufeature)
						@if( $equipment->Serie_Equipo == $cpufeature->Serie_Equipo)
							<a href="{{ url('/admin/equipment/'.$cpufeature->id.'/edit/features') }}">
								<i class="fas fa-edit"></i>	  Editar Características de Equipo
							</a>
						@endif
					@endforeach
				</li>
				{{-- @endif --}}
			</ul>
		</div>

		<div class="inside">
			@foreach($cpufeatures as $cpufeature)
				@if( $equipment->Serie_Equipo == $cpufeature->Serie_Equipo)
					<div class="row">
						<div class="col-md-6">
							{{-- <p style="font-size: 1.5em;"><strong>Marca:</strong> {{ $equipment->Marca }}</p>

							<p style="font-size: 1.5em;"><strong>Modelo:</strong> {{ $equipment->Modelo }}</p>

							<p style="font-size: 1.5em;"><strong>Descripción:</strong> {{ $equipment->Descripcion }}</p> --}}

							<p style="font-size: 1.5em;"><strong>Procesador:</strong> {{ $cpufeature->Procesador }}</p>

							<p style="font-size: 1.5em;"><strong>Velocidad Procesador:</strong> {{ $cpufeature->Velocidad_Procesador }}</p>

							<p style="font-size: 1.5em;"><strong>Memoria RAM:</strong> {{ $cpufeature->Memoria_RAM }}</p>

							<p style="font-size: 1.5em;"><strong>Capacidad Disco Duro:</strong> {{ $cpufeature->Capacidad_DiscoDuro }}</p>

							<p style="font-size: 1.5em;"><strong>Sistema Operativo:</strong> {{ $cpufeature->Sistema_Operativo }}</p>

							<p style="font-size: 1.5em;"><strong>ESET32:</strong> {{ $cpufeature->ESET32 }}</p>

							<p style="font-size: 1.5em;"><strong>Office:</strong> {{ $cpufeature->Office }}</p>

							<p style="font-size: 1.5em;"><strong>Service Tag:</strong> {{ $cpufeature->Service_Tag }}</p>

							<p style="font-size: 1.5em;"><strong>Service Code:</strong> {{ $cpufeature->Service_Code }}</p>
						</div>
						<div class="col-md-6">
							<p style="font-size: 1.5em;"><strong>IP:</strong> {{ $cpufeature->IP }}</p>

							<p style="font-size: 1.5em;"><strong>Usuario:</strong> {{ $cpufeature->Usuario }}</p>

							<p style="font-size: 1.5em;"><strong>Contrasenia CPU:</strong> {{ $cpufeature->Contrasenia_CPU }}</p>

							<p style="font-size: 1.5em;"><strong>Remoto:</strong> {{ $cpufeature->Remoto }}</p>

							<p style="font-size: 1.5em;"><strong>Contrasenia Remoto:</strong> {{ $cpufeature->Contrasenia_Remoto }}</p>

							<p style="font-size: 1.5em;"><strong>Serie Raton:</strong> {{ $cpufeature->Serie_Raton }}</p>

							<p style="font-size: 1.5em;"><strong>Serie Teclado:</strong> {{ $cpufeature->Serie_Teclado }}</p>

							<p style="font-size: 1.5em;"><strong>Serie Monitor:</strong> {{ $cpufeature->Serie_Monitor }}</p>
						</div>
					</div>
				@endif
			@endforeach








		</div>
	</div>
</div>
@endsection