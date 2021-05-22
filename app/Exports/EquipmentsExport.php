<?php

namespace App\Exports;

use App\Models\Equipment;
use App\Models\CPUFeatures;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;


class EquipmentsExport implements FromView
{
	use Exportable;

	private $sucursal;

	public function forSucursal($sucursal)
	{
		$this->sucursal = $sucursal;

		return $this;
	}


	public function view(): View
	{
		$equipments = Equipment::where('Sucursal', $this->sucursal)->orderBy('Departamento', 'asc')->get();
		$cpufeatures = CPUFeatures::all();
		$totalequipos = Equipment::where('Sucursal', $this->sucursal)->count();
		$sucursal = $this->sucursal;

		$data = [
            'equipments' => $equipments,
            'cpufeatures' => $cpufeatures,
            'totalequipos' => $totalequipos,
            'sucursal' => $sucursal,
        ];

		return view('admin.reports.report_inventory', $data);
	}

}
