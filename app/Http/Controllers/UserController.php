<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.list')->with(compact('users'));
    }
    
    public function prueba()
    {
        return view('prueba')->with([
            'data' => 'Un dato',
        ]);
    }
}
