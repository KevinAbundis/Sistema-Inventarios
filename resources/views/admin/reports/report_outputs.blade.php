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
		<p style="text-align: right; text-transform: uppercase; font-family:'Times New Roman'; font-size: 12">
			ACAPULCO, GRO., A {{ $Fecha_Salida->format('d') }} DE {{ getMonths(null,$Fecha_Salida->format('m'))  }} DEL {{ $Fecha_Salida->format('Y') }}.
		</p>
		<br>
		<p style="text-align: left; text-transform: uppercase; font-family:'Times New Roman'; font-size: 12; font-style: bold">
			AT´N: SEGURIDAD</p>
		<br>
		<p style="text-align: left; text-transform: uppercase; font-family:'Times New Roman'; font-size: 12; font-style: bold">
			SALE:</p>
		<p style="font-style: italic; text-decoration: underline; text-transform: uppercase; font-family:'Times New Roman'; font-size: 12">
			EL SIGUIENTE EQUIPO PROPIEDAD DE DISTRIBUIDORA AUTOMOTRIZ ACAPULCO S.A. DE C.V. A LA SUCURSAL {{ $Sucursal }} PARA SER USADO EN EL ÁREA DE {{ $Departamento }}. </p>
		<br>
		<table class="table" border="1" style="table-layout: auto; width: 100%; border-collapse: collapse; ">
			<thead>
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-weight: bold; font-family:'Times New Roman'; font-size: 10">
						DESCRIPCION
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-weight: bold; font-family:'Times New Roman'; font-size: 10">
						MARCA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-weight: bold; font-family:'Times New Roman'; font-size: 10">
						MODELO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-weight: bold; font-family:'Times New Roman'; font-size: 10">
						NO. SERIE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-weight: bold; font-family:'Times New Roman'; font-size: 10">
						SERVICE TAG / SERVICE CODE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-weight: bold; font-family:'Times New Roman'; font-size: 10">
						DEPARTAMENTO
					</td>
				</tr>
			</thead>
			<tbody>
				@foreach($outputs as $output)
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-family:'Times New Roman'; font-size: 10">
						{{ $output->Descripcion }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-family:'Times New Roman'; font-size: 10">
						{{ $output->Marca }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-family:'Times New Roman'; font-size: 10">
						{{ $output->Modelo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-family:'Times New Roman'; font-size: 10">
						{{ $output->Serie_Equipo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-family:'Times New Roman'; font-size: 10">
						{{ $output->Service_Tag }} / {{ $output->Service_Code }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 0.7em; font-family:'Times New Roman'; font-size: 10">
						{{ $output->Departamento }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<p style="text-align: justify; text-transform: uppercase; font-family:'Times New Roman'; font-size: 10; font-style: bold">
			EN LA INTELIGENCIA DE QUE CUALQUIER MAL USO Ó FALTANTE DE LA MISMA ME HAGO RESPONSABLE.</p>
		<br>
		<p style="text-align: justify; text-transform: uppercase; font-family:'Times New Roman'; font-style: bold">
			ATENTAMENTE</p>
		<br>
		<p style="text-align: justify; text-transform: uppercase; font-family:'Times New Roman'; font-size: 12">
			ING. HENRY CRISTOPHER MARTÍNEZ OLEA</p>
		<p style="text-align: justify; text-transform: uppercase; font-family:Georgia, 'Times New Roman', Times, serif; font-size: 12">
			ENCARGADO DE SISTEMAS</p>
		<br><br>
		<p style="text-align: justify; text-transform: uppercase; font-family:Georgia, 'Times New Roman', Times, serif; font-size: 12; font-style: bold">
			RECIBE</p>
		<br>
		<p style="text-align: justify; text-transform: uppercase; font-family:Georgia, 'Times New Roman', Times, serif; font-size: 12"">SUC. {{ $Sucursal }}</p>
	@endif


</body>
</html>