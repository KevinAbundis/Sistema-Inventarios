<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Image, Hash, Auth, Mail, Str, Config;
use App\Models\Equipment;

class EquipmentsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getEquipmentHome($filter){
    	if($filter == 'all'):
           $equipments = Equipment::all();
        else:
            $equipments = Equipment::where('Tipo_Hardware', $filter)->get();
        endif;
    	$data = ['equipments' => $equipments];
    	return view('admin.equipments.home', $data);
    }



}
