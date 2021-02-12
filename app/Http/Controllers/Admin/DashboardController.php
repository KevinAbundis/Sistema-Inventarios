<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    	$this->middleware('isadmin');
    	$this->middleware('user.status');
    }

    public function getDashboard(){
    	$users = User::count();

    	$data = ['users' => $users];

    	return view('admin.dashboard', $data);
    }
}