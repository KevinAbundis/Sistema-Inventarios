<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Image, Hash, Auth, Mail, Str, Config;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
        $this->middleware('user.status');
    }

    public function getUsers(){
        $users = User::all();
        // if($status == 'all'):
    	   // $users = User::orderBy('id', 'Asc')->paginate(25);
        // else:
        //     $users = User::where('status', $status)->orderBy('id', 'Asc')->paginate(25);
        // endif;
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

    public function getAccountEdit(){
        return view('admin.users.account_edit');
    }

    public function postAccountAvatar(Request $request){
    	$rules = [
            'avatar' => 'required',
        ];

        $messages = [
            'avatar.required' => 'Seleccione una imagen.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger')->withInput();
        else:
        	if($request->hasFile('avatar')):
                //Esto sirve para guardar la imagen del producto
        		$path = Auth::id();
        		$fileExt = trim($request->file('avatar')->getClientOriginalExtension());
        		$upload_path = Config::get('filesystems.disks.uploads_user.root');
        		$name = Str::slug(str_replace($fileExt, '', $request->file('avatar')->getClientOriginalName()));

        		$filename = rand(1,999).'_'.$name.'.'.$fileExt;
        		$file_file = $upload_path.'/'.$path.'/'.$filename;

        		$u = User::find(Auth::id());
        		$aa = $u->avatar;
        		$u->avatar = $filename;

        		$filename1 = $upload_path.'/'.$path.'/'.$aa;
        		$filename2 = $upload_path.'/'.$path.'/av_'.$aa;

        		if(file_exists($filename1)):
        			unlink($filename1);
        		endif;

        		if(file_exists($filename2)):
        			unlink($filename2);
        		endif;

        		if($u->save()):
        			if($request->hasFile('avatar')):
        				$fl = $request->avatar->storeAs($path, $filename, 'uploads_user');

        				$img = Image::make($file_file);
        				$img->fit(256, 256, function($constraint){
        					$constraint->upsize();
        				});
        				$img->save($upload_path.'/'.$path.'/av_'.$filename);
        			endif;
        			return back()->with('message','Avatar actualizado con éxito.')->with('typealert','success');
        		endif;
        	endif;

        endif;
    }



    // public function postUserSearch(Request $request){
    //     $rules = [
    //         'search' => 'required',
    //     ];

    //     $messages = [
    //         'search.required' => 'El campo consulta es requerido.',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);
    //     if($validator->fails()):
    //         return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger');
    //     else:
    //         switch ($request->input('filter')):
    //             case '0':
    //                 $users = User::where('name', 'LIKE', '%'.$request->input('search').'%')->orderBy('id', 'asc')->paginate(25);
    //                 break;
    //             case '1':
    //                 $users = User::where('lastname', 'LIKE', '%'.$request->input('search').'%')->orderBy('id', 'asc')->paginate(25);
    //         endswitch;
    //         $data = ['users' => $users];
    //         return view('admin.users.user_search', $data);
    //     endif;
    // }



}
