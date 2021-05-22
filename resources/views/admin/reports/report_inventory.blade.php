<h1>DISTRIBUIDORA  AUTOMOTRIZ ACAPULCO S.A. DE CV.</h1>
<h3>AGENCIA {{ strtoupper($sucursal) }}</h3>
<br>
<table>
	<thead>
		<tr>
			{{-- <td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				ID
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				SUCURSAL
			</td> --}}
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				DEPARTAMENTO
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				UBICACIÓN
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				TIPO DE EQUIPO
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				DESCRIPCIÓN
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				MARCA
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				MODELO
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				NO. SERIE
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				SERVICE TAG
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				SERVICE CODE
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				PROCESADOR
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				VEL.PROC.
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				MEMORIA
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				CAP. D.D.
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				S.O.
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				ESET32
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				OFFICE
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				IP
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				USUARIO
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				CONTRA. CPU
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				REMOTO
			</td>
			<td style="background-color: #134A9C; color: #ffffff; font-weight: bold;">
				CONTRA. REMOTO
			</td>
		</tr>
	</thead>
	<tbody>
		@foreach($equipments as $equipment)
		<tr>
			{{-- <td>
				{{ $equipment->id }}
			</td>
			<td>
				{{ $equipment->Sucursal }}
			</td> --}}
			<td>
				{{ $equipment->Departamento }}
			</td>
			<td>
				{{ $equipment->Ubicacion }}
			</td>
			<td>
				{{ $equipment->Tipo_Hardware }}
			</td>
			<td>
				{{ $equipment->Descripcion }}
			</td>
			<td>
				{{ $equipment->Marca }}
			</td>
			<td>
				{{ $equipment->Modelo }}
			</td>
			<td>
				{{ $equipment->Serie_Equipo }}
			</td>
			@foreach($cpufeatures as $cpufeature)
				@if( $equipment->Serie_Equipo == $cpufeature->Serie_Equipo)
					<td>
						{{ $cpufeature->Service_Tag }}
					</td>
					<td>
						{{ $cpufeature->Service_Code }}
					</td>
					<td>
						{{ $cpufeature->Procesador }}
					</td>
					<td>
						{{ $cpufeature->Velocidad_Procesador }}
					</td>
					<td>
						{{ $cpufeature->Memoria_RAM }}
					</td>
					<td>
						{{ $cpufeature->Capacidad_DiscoDuro }}
					</td>
					<td>
						{{ $cpufeature->Sistema_Operativo }}
					</td>
					<td>
						{{ $cpufeature->ESET32 }}
					</td>
					<td>
						{{ $cpufeature->Office }}
					</td>
					<td>
						{{ $cpufeature->IP }}
					</td>
					<td>
						{{ $cpufeature->Usuario }}
					</td>
					<td>
						{{ $cpufeature->Contrasenia_CPU }}
					</td>
					<td>
						{{ $cpufeature->Remoto }}
					</td>
					<td>
						{{ $cpufeature->Contrasenia_Remoto }}
					</td>
				@endif
			@endforeach
		</tr>
		@endforeach
	</tbody>
</table>
<h4>TOTAL DE EQUIPOS: {{ $totalequipos }}</h4>