<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Image, Hash, Auth, Mail, Str, Config;
use App\Models\Repairs;
use App\Models\Equipment;
use App\Models\CPUFeatures;

class RepairsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getRepairHome($filter){
    	switch ($filter) {
            case 'all':
                $repairs = Repairs::all();
                break;
            case '1':
                  $repairs = Repairs::where('Fecha_Entrega', '!=', null)->get();
                break;
            case '0':
                  $repairs = Repairs::where('Fecha_Entrega', null)->get();
                break;
            default:
                  $repairs = Repairs::where('Sucursal', $filter)->get();
                break;
        }

    	$data = [
    		'repairs' => $repairs
    	];

    	return view('admin.repairs.home', $data);
    }

    public function getRepairOutput(){
        $equipments = Equipment::select('Serie_Equipo')->orderBy('Serie_Equipo', 'asc')->get();
        $data = ['equipments' => $equipments];
        return view('admin.repairs.repair_output', $data);
    }

    public function getRepairOutputDatos($serie_equipo_r){
    $equipments = Equipment::where('Serie_Equipo', $serie_equipo_r)->get();
    $cpufeatures = CPUFeatures::where('Serie_Equipo', $serie_equipo_r)->get();
    $data = ['equipments' => $equipments, 'cpufeatures' => $cpufeatures];
    return view('admin.repairs.repair_output_datos', $data);
    }


    public function getRepairEdit($id){
        $repair = Repairs::findOrFail($id);
        $data = ['repair' => $repair];
        return view('admin.repairs.repair_edit', $data);
    }

    public function getRepairDelivery($id){
        $repair = Repairs::findOrFail($id);
        $data = ['repair' => $repair];
        return view('admin.repairs.repair_delivery', $data);
    }

}
