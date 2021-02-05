<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
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
}
