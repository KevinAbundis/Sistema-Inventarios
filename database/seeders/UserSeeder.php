<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Guardar datos de un usuario en especifico
    	DB::table('users')->insert([
    		'status' => '1',
    		'role' => '1',
            'name' => 'Administrador',
            'lastname' => 'Administrador',
            'email' => 'capacitacion@chevroletacapulco.com',
            'password' => Hash::make('12345678'),
            'permissions' => '{"dashboard":"true","user_list":"true","account_edit":"true","user_add":"true","user_edit":"true","user_permissions":"true","equipment_list":"true","repair_list":"true","maintenance_list":"true","reports_home":"true"}',
        ]);
    }
}
