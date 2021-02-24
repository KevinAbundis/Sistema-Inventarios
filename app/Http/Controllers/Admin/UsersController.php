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
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
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

            //Se le agregan estos permisos por defecto a un usuario normal
            if($user->role == "0"):
            $user->permissions = '{"dashboard":"true","dashboard_small_stats":"true","user_list":"true","account_edit":"true"}';
            else:
                //Se le agregan estos permisos por defecto a un usuario administrador
                $user->permissions = '{"dashboard":"true","dashboard_small_stats":"true","user_list":"true","account_edit":"true","user_add":"true","user_edit":"true","user_permissions":"true"}';
            endif;


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

    public function postAccountPassword(Request $request){
        $rules = [
            'apassword' => 'required|min:8',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password',
        ];

        $messages = [
            'apassword.required' => 'Contraseña actual es requerido.',
            'apassword.min' => 'La contraseña actual debe tener al menos 8 caracteres.',
            'password.required' => 'Nueva contraseña es requerido.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'cpassword.required' => 'Confirmar nueva contraseña es requerido.',
            'cpassword.min' => 'La confirmación de la nueva contraseña debe tener al menos 8 caracteres.',
            'cpassword.same' => 'Las contraseñas no coinciden.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger')->withInput();
        else:
            $u = User::find(Auth::id());
            if(Hash::check($request->input('apassword'), $u->password)):
                $u->password = Hash::make($request->input('password'));
                if($u->save()):
                    return back()->with('message','Su contraseña fue actualizada con éxito.')->with('typealert','success');
                endif;
            else:
                return back()->with('message','Su contraseña actual no es correcta.')->with('typealert','danger');
            endif;
        endif;
    }

    public function postAccountInfo(Request $request){
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
        ];

        $messages = [
            'name.required' => 'Su nombre es requerido.',
            'lastname.required' => 'Sus apellidos son requeridos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error.')->with('typealert','danger')->withInput();
        else:
             $u = User::find(Auth::id());
             $u->name = e($request->input('name'));
             $u->lastname = e($request->input('lastname'));
             if($u->save()):
                return back()->with('message','Su información fue actualizada con éxito.')->with('typealert','success');
                endif;
        endif;
    }

    public function getUserPermissions($id){
        $u = User::findOrFail($id);
        $data = ['u' => $u];
        return view('admin.users.user_permissions', $data);
    }

    public function postUserPermissions(Request $request, $id){
        $u = User::findOrFail($id);
        $u->permissions = $request->except(['_token']);

        if($u->save()):
            return redirect('/admin/users/all')->with('message', 'Los permisos del usuario fueron actualizados con éxito.')->with('typealert','success');
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
