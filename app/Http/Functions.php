<?php

//Key Value From JSON
function kvfj($json, $key){
	if($json == null):
		return null;
	else:
		$json = $json;
		$json =json_decode($json, true);
		if(array_key_exists($key, $json)):
			return $json[$key];
		else:
			return null;
		endif;
	endif;
}


function getRoleUserArray($mode, $id){
	$roles = [
		'0' => 'Usuario Normal',
		'1' => 'Administrador'
	];
	if(!is_null($mode)):
		return $roles;
	else:
		return $roles[$id];
	endif;
}

function getUserStatusArray($mode, $id){
	$status = [
		'1' => 'Activo',
		'100' => 'Suspendido'
	];

	if(!is_null($mode)):
		return $status;
	else:
		return $status[$id];
	endif;
}

function user_permissions(){
	$p = [

		'dashboard' => [
			'icon' => '<i class="fas fa-home"></i>',
			'title' => 'Módulo de Inicio',
			'keys' =>[
				'dashboard' => 'Puede ver el inicio.',
			]
		],


		'users' => [
			'icon' => '<i class="fas fa-user-friends"></i>',
			'title' => 'Módulo de Usuarios',
			'keys' =>[
				'user_list' => 'Puede ver el listado de usuarios del sistema.',
				'account_edit' => 'Puede editar su perfil de usuario.',
				'user_add' => 'Puede agregar usuarios al sistema.',
				'user_edit' => 'Puede editar los usuarios del sistema.',
				'user_permissions' => 'Puede administrar permisos de los usuarios del sistema.',
			]
		],

		'equipments' => [
			'icon' => '<i class="fas fa-boxes"></i>',
			'title' => 'Módulo de Equipos de Cómputo',
			'keys' =>[
				'equipment_list' => 'Puede ver el listado de los equipos de cómputo.',
				'equipment_add' => 'Puede agregar equipos de cómputo al sistema.',
				'equipment_edit' => 'Puede editar los equipos de cómputo del sistema.',
				'equipment_delete' => 'Puede eliminar los equipos de cómputo del sistema.',
				'equipment_output' => 'Puede realizar salidas a sucursales de equipos de cómputo .',
			]
		],

		'repairs' => [
			'icon' => '<i class="fas fa-tools"></i>',
			'title' => 'Módulo de Reparación de Equipos de Cómputo',
			'keys' =>[
				'repair_list' => 'Puede ver el listado de las reparaciones de equipos de cómputo.',
				'repair_output' => 'Puede realizar salidas a reparación de equipos de cómputo.',
				'repair_edit' => 'Puede editar las reparaciones de equipos de cómputo.',
			]
		],

		'maintenances' => [
			'icon' => '<i class="fas fa-toolbox"></i>',
			'title' => 'Módulo de Mantenimiento de Equipos de Cómputo',
			'keys' =>[
				'maintenance_list' => 'Puede ver el listado de los mantenimientos a equipos de cómputo.',
			]
		],

		'reports' => [
			'icon' => '<i class="fas fa-file-contract"></i>',
			'title' => 'Módulo de Reportes',
			'keys' =>[
				'reports_home' => 'Puede ver los reportes.',
			]
		],





	];

	return $p;
}

function getUserYears(){
	$ya = date('Y');
	$ym = $ya - 18;
	$yo = $ym - 62;

	return [$ym, $yo];
}


function getMonths($mode, $key){
	$m = [
		'01' => 'ENERO',
		'02' => 'FEBRERO',
		'03' => 'MARZO',
		'04' => 'ABRIL',
		'05' => 'MAYO',
		'06' => 'JUNIO',
		'07' => 'JULIO',
		'08' => 'AGOSTO',
		'09' => 'SEPTIEMBRE',
		'10' => 'OCTUBRE',
		'11' => 'NOVIEMBRE',
		'12' => 'DICIEMBRE'
	];

	if($mode == "list"){
		return $m;
	}else{
		return $m[$key];
	}


}