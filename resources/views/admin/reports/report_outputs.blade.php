<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reporte de Salidas PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

	@if($outputs == "[]")
	<p style="text-align: center;">NO SE ENCONTRARON COINCIDENCIAS EN LA BASE DE DATOS</p>
	<p style="text-align: center;">{{ $outputs }}</p>
	<p style="text-align: center;">:c</p>
	<p style="text-align: center;">INTENTA CON OTROS DATOS</p>
	@else
		<p style="text-align: right; text-transform: uppercase;">
			ACAPULCO, GRO., A {{ $Fecha_Salida->format('d') }} DE {{ getMonths(null,$Fecha_Salida->format('m'))  }} DEL {{ $Fecha_Salida->format('Y') }}.
		</p>
		<br>
		<h4>AT´N: SEGURIDAD</h4>
		<br>
		<h4>SALE:</h4>
		<p style="font-style: italic; text-decoration: underline; text-transform: uppercase;">EL SIGUIENTE EQUIPO PROPIEDAD DE DISTRIBUIDORA AUTOMOTRIZ ACAPULCO S.A. DE C.V. A LA SUCURSAL {{ $Sucursal }} PARA SER USADO EN EL ÁREA DE {{ $Departamento }}. </p>
		<br>
		<table class="table" border="1" style="table-layout: auto; width: 100%; border-collapse: collapse;">
			<thead>
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						DESCRIPCION
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						MARCA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						MODELO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						NO. SERIE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						SERVICE TAG / SERVICE CODE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						DEPARTAMENTO
					</td>
				</tr>
			</thead>
			<tbody>
				@foreach($outputs as $output)
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Descripcion }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Marca }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Modelo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Serie_Equipo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Service_Tag }} / {{ $output->Service_Code }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Departamento }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br>
		<h4>EN LA INTELIGENCIA DE QUE CUALQUIER MAL USO Ó FALTANTE DE LA MISMA ME HAGO RESPONSABLE.</h4>
		<br>
		<h4>ATENTAMENTE</h4>
		<br>
		<p>ING. HENRY CRISTOPHER MARTÍNEZ OLEA</p>
		<p>ENCARGADO DE SISTEMAS</p>
		<br>
		<h4>RECIBE</h4>
		<br>
		<p style="text-transform: uppercase;">SUC. {{ $Sucursal }}</p>
	@endif


</body>
</html>