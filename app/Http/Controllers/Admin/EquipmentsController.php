<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Image, Hash, Auth, Mail, Str, Config;
use App\Models\Equipment;
use App\Models\CPUFeatures;
use App\Models\Outputs;

class EquipmentsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getEquipmentHome($filter){
    	switch ($filter) {
            case 'all':
                $equipments = Equipment::all();
                $cpufeatures = CPUFeatures::all();
                break;
            case 'trash':
                  $equipments = Equipment::onlyTrashed()->get();
                  $cpufeatures = CPUFeatures::all();
                break;
            default:
                  $equipments = Equipment::where('Sucursal', $filter)->get();
                  $cpufeatures = CPUFeatures::all();
                break;
        }

    	$data = ['equipments' => $equipments, 'cpufeatures' => $cpufeatures];
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

    public function getEquipmentAddFeatures(){
        $equipments = Equipment::select('Serie_Equipo')->where('Tipo_Hardware', 'CPU')->orWhere('Tipo_Hardware', 'Laptop')->orderBy('Serie_Equipo', 'asc')->get();
        $data = ['equipments' => $equipments];
        return view('admin.equipments.equipment_add_features', $data);
    }

    public function postEquipmentAddFeatures(Request $request){
        $rules = [
            'Serie_Equipo' => 'required|unique:caracteristicas_cpu',
        ];

        $messages = [
            'Serie_Equipo.required' => 'Número de Serie es requerido.',
            'Serie_Equipo.unique' => 'Ya existe un equipo registrado con este número de serie.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
        else:
            $cpufeature = new CPUFeatures;
            $cpufeature->Serie_Equipo = e($request->input('Serie_Equipo'));
            $cpufeature->Procesador = e($request->input('Procesador'));
            $cpufeature->Velocidad_Procesador = e($request->input('Velocidad_Procesador'));
            $cpufeature->Memoria_RAM = e($request->input('Memoria_RAM'));
            $cpufeature->Capacidad_DiscoDuro = e($request->input('Capacidad_DiscoDuro'));
            $cpufeature->Sistema_Operativo = e($request->input('Sistema_Operativo'));
            $cpufeature->ESET32 = e($request->input('ESET32'));
            $cpufeature->Office = e($request->input('Office'));
            $cpufeature->Service_Tag = e($request->input('Service_Tag'));
            $cpufeature->Service_Code = e($request->input('Service_Code'));
            $cpufeature->IP = e($request->input('IP'));
            $cpufeature->Usuario = e($request->input('Usuario'));
            $cpufeature->Contrasenia_CPU = e($request->input('Contrasenia_CPU'));
            $cpufeature->Remoto = e($request->input('Remoto'));
            $cpufeature->Contrasenia_Remoto = e($request->input('Contrasenia_Remoto'));
            // $cpufeature->Serie_Raton = e($request->input('Serie_Raton'));
            // $cpufeature->Serie_Teclado = e($request->input('Serie_Teclado'));
            // $cpufeature->Serie_Monitor = e($request->input('Serie_Monitor'));

            if($cpufeature->save()):
                return redirect('/admin/equipments/all')->with('message','Características del equipo agregadas con éxito.')->with('typealert','success');
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

    public function getEquipmentEditFeatures($id){
        $cpufeature = CPUFeatures::findOrFail($id);
        $data = ['cpufeature' => $cpufeature];
        return view('admin.equipments.equipment_edit_features', $data);
    }

    public function postEquipmentEditFeatures(Request $request, $id){

        $validator = Validator::make($request->all(), [], []);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
        else:
            $cpufeature = CPUFeatures::findOrFail($id);
            $cpufeature->Serie_Equipo = e($request->input('Serie_Equipo'));
            $cpufeature->Procesador = e($request->input('Procesador'));
            $cpufeature->Velocidad_Procesador = e($request->input('Velocidad_Procesador'));
            $cpufeature->Memoria_RAM = e($request->input('Memoria_RAM'));
            $cpufeature->Capacidad_DiscoDuro = e($request->input('Capacidad_DiscoDuro'));
            $cpufeature->Sistema_Operativo = e($request->input('Sistema_Operativo'));
            $cpufeature->ESET32 = e($request->input('ESET32'));
            $cpufeature->Office = e($request->input('Office'));
            $cpufeature->Service_Tag = e($request->input('Service_Tag'));
            $cpufeature->Service_Code = e($request->input('Service_Code'));
            $cpufeature->IP = e($request->input('IP'));
            $cpufeature->Usuario = e($request->input('Usuario'));
            $cpufeature->Contrasenia_CPU = e($request->input('Contrasenia_CPU'));
            $cpufeature->Remoto = e($request->input('Remoto'));
            $cpufeature->Contrasenia_Remoto = e($request->input('Contrasenia_Remoto'));
            // $cpufeature->Serie_Raton = e($request->input('Serie_Raton'));
            // $cpufeature->Serie_Teclado = e($request->input('Serie_Teclado'));
            // $cpufeature->Serie_Monitor = e($request->input('Serie_Monitor'));

            if($cpufeature->save()):
                return redirect('/admin/equipments/all')->with('message','Características del equipo actualizados con éxito.')->with('typealert','success');
            endif;
        endif;
    }


    public function getEquipmentDelete($id){
    	$equipment = Equipment::findOrFail($id);

    	if($equipment->delete()):
    		return back()->with('message','Equipo enviado a la papelera de reciclaje con éxito.')->with('typealert','success');
    	endif;
    }

    public function getEquipmentRestore($id){
    	$equipment = Equipment::onlyTrashed()->where('id', $id)->first();

    	if($equipment->restore()):
    		return redirect('/admin/equipment/'.$equipment->id.'/edit')->with('message','Equipo se restauró con éxito.')->with('typealert','success');
    	endif;

    }

    public function getEquipmentInfo($id){
        $equipment = Equipment::findOrFail($id);
        $cpufeatures = CPUFeatures::all();
        $data = ['equipment' => $equipment, 'cpufeatures' => $cpufeatures];
        return view('admin.equipments.equipment_info', $data);
    }

    public function getEquipmentOutput(){
    $equipments = Equipment::select('Serie_Equipo')->orderBy('Serie_Equipo', 'asc')->get();
    $data = ['equipments' => $equipments];
    return view('admin.equipments.equipment_output', $data);
    }

    public function getEquipmentOutputDatos($serie_equipo){
    $equipments = Equipment::where('Serie_Equipo', $serie_equipo)->get();
    $cpufeatures = CPUFeatures::where('Serie_Equipo', $serie_equipo)->get();
    $data = ['equipments' => $equipments, 'cpufeatures' => $cpufeatures];
    return view('admin.equipments.equipment_output_datos', $data);
    }

    public function postEquipmentOutput(Request $request){

        $validator = Validator::make($request->all(), [], []);
        if($validator->fails()):
            return back()->with('message','Se ha producido un error.')->with('typealert','danger');
        else:
            $output = new Outputs;
            $output->Nombre_Usuario = e($request->get('Nombre_Usuario'));
            $output->Descripcion = e($request->input('Descripcion'));
            $output->Marca = e($request->input('Marca'));
            $output->Modelo = e($request->input('Modelo'));
            $output->Serie_Equipo = e($request->input('Serie_Equipo'));
            $output->Service_Tag = e($request->input('Service_Tag'));
            $output->Service_Code = e($request->input('Service_Code'));
            $output->Sucursal_Entrega = 'Matriz';
            $output->Sucursal_Recibe = e($request->input('Sucursal_Recibe'));
            $output->Departamento = e($request->input('Departamento'));
            $output->Ubicacion = e($request->input('Ubicacion'));
            $output->Fecha_Salida = e($request->input('Fecha_Salida'));

            //Si se realiza una salida se mofica la sucursal, departamento y ubicación a donde
            //se manda el equipo de cómputo
            $serie_equipo = e($request->input('Serie_Equipo'));
            $id_equipo = Equipment::select('id')->where('Serie_Equipo', $serie_equipo )->first();

            $equipment = Equipment::findOrFail($id_equipo->id);
            $equipment->Sucursal = e($request->input('Sucursal_Recibe'));
            $equipment->Departamento = e($request->input('Departamento'));
            $equipment->Ubicacion = e($request->input('Ubicacion'));

            if($output->save()):
                if($equipment->save()):
                return redirect('/admin/equipments/all')->with('message','Salida de equipo realizada con éxito.')->with('typealert','success');
                endif;
            endif;
        endif;
    }



}
