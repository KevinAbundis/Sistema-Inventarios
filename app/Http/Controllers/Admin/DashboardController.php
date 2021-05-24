<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Equipment;
use App\Models\Repairs;
use App\Models\Maintenances;

class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getDashboard(){
    	$users = User::count();
        $cpus = Equipment::where('Tipo_Hardware', 'CPU')->count();
        $monitores = Equipment::where('Tipo_Hardware', 'Monitor')->count();
        $teclados = Equipment::where('Tipo_Hardware', 'Teclado')->count();
        $ratones = Equipment::where('Tipo_Hardware', 'Raton')->count();
        $impresoras = Equipment::where('Tipo_Hardware', 'Impresora')->count();
        $telefonos = Equipment::where('Tipo_Hardware', 'Telefono')->count();
        $switches = Equipment::where('Tipo_Hardware', 'Switch')->count();
        $modems = Equipment::where('Tipo_Hardware', 'Modem')->count();
        $laptops = Equipment::where('Tipo_Hardware', 'Laptop')->count();
        $otrosequipos = Equipment::where('Tipo_Hardware', 'Otro_Equipo')->count();

        $repairs = Repairs::where('Fecha_Entrega', null)->count();
        $maintenances = Maintenances::where('Fecha_Efectiva', null)->count();

    	$data =
        [
            'users' => $users,
            'cpus' => $cpus,
            'monitores' => $monitores,
            'teclados' => $teclados,
            'ratones' => $ratones,
            'impresoras' => $impresoras,
            'telefonos' => $telefonos,
            'switches' => $switches,
            'modems' => $modems,
            'laptops' => $laptops,
            'otrosequipos' => $otrosequipos,

            'repairs' => $repairs,
            'maintenances' => $maintenances,
        ];

    	return view('admin.dashboard', $data);
    }
}
