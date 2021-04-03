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

    public function getEquipmentAdd(){
    	$equipments = Equipment::all();
    	$data = ['equipments' => $equipments];
    	return view('admin.equipments.equipment_add', $data);
    }

    public function postEquipmentAdd(Request $request){
    	$rules = [
    		'Serie_Equipo' => 'required|unique:equipos',
    		'Id_Sucursal' => 'required',
    		'Id_Departamento' => 'required',
    		'Id_Ubicacion' => 'required',
    	];

    	$messages = [
    		'Serie_Equipo.required' => 'Número de Serie es requerido.',
    		'Serie_Equipo.unique' => 'Ya existe un equipo registrado con este número de serie.',
    		'Id_Sucursal.required' => 'Sucursal es requerido.',
    		'Id_Departamento.required' => 'Departamento es requerido.',
    		'Id_Ubicacion.required' => 'Ubicación es requerida.',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
    	else:
    		$equipment = new Equipment;
    		$equipment->Serie_Equipo = e($request->input('Serie_Equipo'));
    		$equipment->Id_Sucursal = e($request->input('Id_Sucursal'));
    		$equipment->Id_Departamento = e($request->input('Id_Departamento'));
    		$equipment->Id_Ubicacion = e($request->input('Id_Ubicacion'));
    		$equipment->Tipo_Hardware = e($request->input('Tipo_Hardware'));
    		$equipment->Marca = e($request->input('Marca'));
    		$equipment->Modelo = e($request->input('Modelo'));
    		$equipment->Descripcion = e($request->input('Descripcion'));

    		if($equipment->save()):
    			return redirect('/admin/equipments/all')->with('message','Equipo agregado con éxito.')->with('typealert','success');
    		endif;
    	endif;
    }



}
