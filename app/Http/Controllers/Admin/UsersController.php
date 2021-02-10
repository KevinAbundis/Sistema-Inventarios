<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Hash, Auth, Mail, Str;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
    }

    public function getUsers($status){
        if($status == 'all'):
    	   $users = User::orderBy('id', 'Asc')->paginate(25);
        else:
            $users = User::where('status', $status)->orderBy('id', 'Asc')->paginate(25);
        endif;
    	$data = ['users' => $users];
    	return view('admin.users.home', $data);
    }

    public function getUserAdd(){
    	return view('admin.users.user_add');
    }

    public function postUserAdd(Request $request){
    	$rules = [
    		'name' => 'required',
    		'lastname' => 'required',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|min:8',
    	];

    	$messages = [
    		'name.required' => 'Su nombre es requerido.',
    		'lastname.required' => 'Sus apellidos son requeridos.',
    		'email.required' => 'Su correo electrónico es requerido.',
    		'email.email' => 'El formato de su correo electrónico es invalido.',
    		'email,unique' => 'Ya existe un usuario registrado con este correo electrónico.',
    		'password.required' => 'Por favor escriba una contraseña.',
    		'password.min' => 'La contraseña debe de tener al menos 8 caracteres.',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
    	else:
    		$user = new User;
    		$user->name = e($request->input('name'));
    		$user->lastname = e($request->input('lastname'));
    		$user->email = e($request->input('email'));
    		$user->role = $request->input('user_type');
    		$user->status = $request->input('user_status');
    		$user->password = Hash::make($request->input('password'));
    		if($user->save()):
    			return redirect('/admin/users/all')->with('message','Usuario agregado con éxito.')->with('typealert','success');
    		endif;
    	endif;
    }


    public function getUserEdit($id){
    	$user = User::findOrFail($id);
    	$data = ['user' => $user];
    	return view('admin.users.user_edit', $data);
    }


    public function postUserEdit(Request $request, $id){
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ];

        $messages = [
            'name.required' => 'Su nombre es requerido.',
            'lastname.required' => 'Sus apellidos son requeridos.',
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'El formato de su correo electrónico es invalido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
        else:
            $user = User::findOrFail($id);
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->role = $request->input('user_type');
            $user->status = $request->input('user_status');
            if($user->save()):
                return redirect('/admin/users/all')->with('message','Datos del usuario actualizados con éxito.')->with('typealert','success');
            endif;
        endif;
    }

    public function postUserSearch(Request $request){
        $rules = [
            'search' => 'required',
        ];

        $messages = [
            'search.required' => 'El campo consulta es requerido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
        else:
            switch ($request->input('filter')):
                case '0':
                    $users = User::where('name', 'LIKE', '%'.$request->input('search').'%')->orderBy('id', 'asc')->paginate(25);
                    break;
                case '1':
                    $users = User::where('lastname', 'LIKE', '%'.$request->input('search').'%')->orderBy('id', 'asc')->paginate(25);
            endswitch;
            $data = ['users' => $users];
            return view('admin.users.user_search', $data);
        endif;
    }



}
