<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectController extends Controller
{
    public function getLogin(){
    	return view('connect.login');
    }


    public function getRecover(){
        return view('connect.recover');
    }

    public function getReset(Request $request){
        $data = ['email' => $request->get('email')];
        return view('connect.reset', $data);
    }
}
