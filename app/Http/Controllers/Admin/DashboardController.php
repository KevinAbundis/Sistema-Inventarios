<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Equipment;

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
        $otrosequipos = Equipment::where('Tipo_Hardware', 'Otro_Equipo')->count();

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
            'otrosequipos' => $otrosequipos,
        ];

    	return view('admin.dashboard', $data);
    }
}
