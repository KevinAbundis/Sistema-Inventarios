<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reporte de Movimientos de Salidas de Equipos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	@if($outputs == "[]")
	<p style="text-align: center;">NO SE ENCONTRARON COINCIDENCIAS EN LA BASE DE DATOS</p>
	<p style="text-align: center;">{{ $outputs }}</p>
	<p style="text-align: center;">:c</p>
	<p style="text-align: center;">INTENTA CON OTROS DATOS</p>
	@else
		<table class="table" border="1" style="table-layout: auto; width: 100%; border-collapse: collapse;">
			<thead>
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						ID
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						NOMBRE USUARIO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						DESCRIPCION
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						MARCA
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						MODELO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						NO. SERIE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						SERVICE TAG / SERVICE CODE
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						SUCURSAL DESTINO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold; font-size: 9">
						DEPARTAMENTO
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: #134A9C; color: #ffffff; font-weight: bold;font-size: 9">
						FECHA DE SALIDA
					</td>
				</tr>
			</thead>
			<tbody>
				@foreach($outputs as $output)
				<tr>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->id }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->Nombre_Usuario }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->Descripcion }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->Marca }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->Modelo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->Serie_Equipo }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->Service_Tag }} / {{ $output->Service_Code }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->Sucursal_Recibe }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 9">
						{{ $output->Departamento }}
					</td>
					<td style="padding-top: 8px; padding-bottom: 8px; text-align: center; font-size: 8">
						{{ date('d-m-Y', strtotime($output->Fecha_Salida)) }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif

</body>
</html>