<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserDevices($id)
    {
        $user = User::findOrFail($id);
        $devices = $user->devices; // Mengambil semua devices dari user tersebut

        return response()->json($devices);
    }

    function index(){
        $data['title'] = 'Users';
        $data['breadcrumbs'] []=[
            'title'=>'Dashboard',
            'url'=>route('dashboard')
        ];
        $data['breadcrumbs'] []=[
            'title'=>'Users',
            'url'=>'users.index'
        ];

        $users = User::orderBy('name')->get();
        $data['users'] = $users;

        return view('pages.users.index',$data);
    }
}
