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
		'100' => 'Inactivo'
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
			'title' => 'Módulo de Dashboard',
			'keys' =>[
				'dashboard' => 'Puede ver el dashboard.',
				'dashboard_small_stats' => 'Puede ver las estadísticas rápidas.',
				'dashboard_sell_today' => 'Puede ver lo facturado hoy.',
			]
		],


		'users' => [
			'icon' => '<i class="fas fa-user-friends"></i>',
			'title' => 'Módulo de Usuarios',
			'keys' =>[
				'user_list' => 'Puede ver el listado de usuarios.',
				'user_edit' => 'Puede editar los usuarios.',
				'user_banned' => 'Puede suspender los usuarios.',
				'user_permissions' => 'Puede administrar permisos de usuarios.',
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