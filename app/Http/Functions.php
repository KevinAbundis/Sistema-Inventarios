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

		'equipment' => [
			'icon' => '<i class="fas fa-boxes"></i>',
			'title' => 'Módulo de Equipos de Cómputo',
			'keys' =>[
				'equipment_home' => 'Puede ver los diferentes equipos de cómputo.',
			]
		],

		'repair' => [
			'icon' => '<i class="fas fa-tools"></i>',
			'title' => 'Módulo de Reparación de Equipos de Cómputo',
			'keys' =>[
				'repair_home' => 'Puede ver los equipos de cómputo en reparación.',
			]
		],

		'maintenance' => [
			'icon' => '<i class="fas fa-toolbox"></i>',
			'title' => 'Módulo de Mantenimiento de Equipos de Cómputo',
			'keys' =>[
				'maintenance_home' => 'Puede ver los mantenimientos de los equipos de cómputo.',
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
		'01' => 'Enero',
		'02' => 'Febrero',
		'03' => 'Marzo',
		'04' => 'Abril',
		'05' => 'Mayo',
		'06' => 'Junio',
		'07' => 'Julio',
		'08' => 'Agosto',
		'09' => 'Septiembre',
		'10' => 'Octubre',
		'11' => 'Noviembre',
		'12' => 'Diciembre'
	];

	if($mode == "list"){
		return $m;
	}else{
		return $m[$key];
	}


}