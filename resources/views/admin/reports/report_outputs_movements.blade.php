<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reporte de Salidas Movimientos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
		<table class="table" border="1" style="table-layout: auto; width: 100%; border-collapse: collapse;">
			<thead>
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						ID
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						NOMBRE USUARIO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						DESCRIPCION
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						MARCA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						MODELO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						NO. SERIE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						SERVICE TAG / SERVICE CODE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						SUCURSAL DESTINO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						DEPARTAMENTO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;">
						FECHA DE SALIDA
					</td>
				</tr>
			</thead>
			<tbody>
				@foreach($outputs as $output)
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->id }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Nombre_Usuario }}
					</td>
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
						{{ $output->Sucursal_Recibe }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Departamento }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center">
						{{ $output->Fecha_Salida }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

</body>
</html>