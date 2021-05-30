<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reporte de Mantenimientos de Equipos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	@if($maintenances == "[]")
	<p style="text-align: center;">NO SE ENCONTRARON COINCIDENCIAS EN LA BASE DE DATOS</p>
	<p style="text-align: center;">{{ $maintenances }}</p>
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
						FECHA PROGRAMADA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						HORA PROGRAMADA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						FECHA EFECTIVA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						HORA EFECTIVA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						TIPO MANTENIMIENTO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						OBSERVACIONES
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 7">
						REALIZO MANTENIMIENTO
					</td>
				</tr>
			</thead>
			<tbody>
				@foreach($maintenances as $maintenance)
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->id }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Descripcion }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Serie_Equipo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Marca }}  {{ $maintenance->Modelo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Sucursal }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Departamento }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Ubicacion }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 8">
						{{ date('d-m-Y', strtotime($maintenance->Fecha_Programada)) }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Hora_Programada }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 8">
						{{ date('d-m-Y', strtotime($maintenance->Fecha_Efectiva)) }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Hora_Efectiva }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Tipo_Mantenimiento }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Observaciones }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $maintenance->Realizo_Mantenimiento }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif

</body>
</html>