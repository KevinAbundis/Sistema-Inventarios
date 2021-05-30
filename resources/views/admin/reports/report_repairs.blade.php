<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reporte de Reparaciones de Equipos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	@if($repairs == "[]")
	<p style="text-align: center;">NO SE ENCONTRARON COINCIDENCIAS EN LA BASE DE DATOS</p>
	<p style="text-align: center;">{{ $repairs }}</p>
	<p style="text-align: center;">:c</p>
	<p style="text-align: center;">INTENTA CON OTROS DATOS</p>
	@else
		<table class="table" border="1" style="table-layout: auto; width: 100%; border-collapse: collapse;">
			<thead>
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 7">
						ID
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 7">
						DESCRIPCION
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 7">
						NO. SERIE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 7">
						SERVICE TAG / SERVICE CODE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 7">
						MARCA / MODELO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 7">
						SUCURSAL
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 7">
						DEPARTAMENTO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 7">
						UBICACIÓN
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						FECHA SALIDA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						FIRMA SALIDA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						MOTIVO SALIDA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						LUGAR SALIDA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						FECHA ENTREGA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						FIRMA ENTREGA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						ESTADO ENTREGA
					</td>
				</tr>
			</thead>
			<tbody>
				@foreach($repairs as $repair)
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->id }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Descripcion }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Serie_Equipo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Service_Tag }} / {{ $repair->Service_Code }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Marca }}  {{ $repair->Modelo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Sucursal }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Departamento }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Ubicacion }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 8">
						{{ date('d-m-Y', strtotime($repair->Fecha_Salida)) }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Firma_Salida }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Motivo_Salida }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Lugar_Salida }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 8">
						{{ date('d-m-Y', strtotime($repair->Fecha_Entrega)) }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Firma_Entrega }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $repair->Estado_Entrega }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif

</body>
</html>