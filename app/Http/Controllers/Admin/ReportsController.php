<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App;
use App\Models\Outputs;

use Validator, Image, Hash, Auth, Mail, Str, Config;

use App\Exports\EquipmentsExport;

class ReportsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getReportsHome(){
    	return view('admin.reports.home');
	}

    public function getReportOutputsData(){
        return view('admin.reports.report_outputs_data');
    }

	public function postReportOutputs(Request $request){
		// $outputs = Outputs::all();
        $Fecha_Salida = e($request->input('Fecha_Salida'));
        $Sucursal = e($request->input('Sucursal'));
        $Departamento = e($request->input('Departamento'));

        $outputs = Outputs::where('Fecha_Salida', $Fecha_Salida)->where('Sucursal_Recibe', $Sucursal)->where('Departamento', $Departamento)->get();

        $Fecha_Salida = \Carbon\Carbon::parse($Fecha_Salida);

    	$data = [
            'Fecha_Salida' => $Fecha_Salida,
            'Sucursal' => $Sucursal,
            'Departamento' => $Departamento,
            'outputs' => $outputs,
        ];

		$pdf = App::make('dompdf.wrapper');
		$pdf->loadView('admin.reports.report_outputs', $data);
		return $pdf->stream();
	}

    public function getReportOutputsMovementsData(){
        return view('admin.reports.report_outputs_movements_data');
    }

    public function postReportOutputsMovements(Request $request){
        //$outputs = Outputs::all();
        $Fecha_Inicial = e($request->input('Fecha_Inicial'));
        $Fecha_Final = e($request->input('Fecha_Final'));
        $Sucursal = e($request->input('Sucursal'));

        $outputs = Outputs::where('Sucursal_Recibe', $Sucursal)->whereBetween('Fecha_Salida', array($Fecha_Inicial, $Fecha_Final))->get();

        $data = [
            'outputs' => $outputs,
        ];

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.reports.report_outputs_movements', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

     public function getReportInventoryData(){
        return view('admin.reports.report_inventory_data');
    }

    public function postReportInventory(Request $request){

        $sucursal = e($request->input('Sucursal'));

        return (new EquipmentsExport)->forSucursal($sucursal)->download('inventory.xlsx');
    }


}
