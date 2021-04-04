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
            $equipments = Equipment::where('Sucursal', $filter)->get();
        endif;
    	$data = ['equipments' => $equipments];
    	return view('admin.equipments.home', $data);
    }

    public function getEquipmentAdd(){
    	return view('admin.equipments.equipment_add');
    }

    public function postEquipmentAdd(Request $request){
    	$rules = [
    		'Serie_Equipo' => 'required|unique:equipos',
    	];

    	$messages = [
    		'Serie_Equipo.required' => 'Número de Serie es requerido.',
    		'Serie_Equipo.unique' => 'Ya existe un equipo registrado con este número de serie.',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
    	else:
    		$equipment = new Equipment;
    		$equipment->Serie_Equipo = e($request->input('Serie_Equipo'));
    		$equipment->Sucursal = e($request->input('Sucursal'));
    		$equipment->Departamento = e($request->input('Departamento'));
    		$equipment->Ubicacion = e($request->input('Ubicacion'));
    		$equipment->Tipo_Hardware = e($request->input('Tipo_Hardware'));
    		$equipment->Marca = e($request->input('Marca'));
    		$equipment->Modelo = e($request->input('Modelo'));
    		$equipment->Descripcion = e($request->input('Descripcion'));

    		if($equipment->save()):
    			return redirect('/admin/equipments/all')->with('message','Equipo agregado con éxito.')->with('typealert','success');
    		endif;
    	endif;
    }

    public function getEquipmentEdit($id){
    	$equipment = Equipment::findOrFail($id);
    	$data = ['equipment' => $equipment];
    	return view('admin.equipments.equipment_edit', $data);
    }

    public function postEquipmentEdit(Request $request, $id){

    	$validator = Validator::make($request->all(), [], []);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
    	else:
    		$equipment = Equipment::findOrFail($id);
    		$equipment->Serie_Equipo = e($request->input('Serie_Equipo'));
    		$equipment->Sucursal = e($request->input('Sucursal'));
    		$equipment->Departamento = e($request->input('Departamento'));
    		$equipment->Ubicacion = e($request->input('Ubicacion'));
    		$equipment->Tipo_Hardware = e($request->input('Tipo_Hardware'));
    		$equipment->Marca = e($request->input('Marca'));
    		$equipment->Modelo = e($request->input('Modelo'));
    		$equipment->Descripcion = e($request->input('Descripcion'));

    		if($equipment->save()):
    			return redirect('/admin/equipments/all')->with('message','Datos del equipo actualizados con éxito.')->with('typealert','success');
    		endif;
    	endif;
    }



}
