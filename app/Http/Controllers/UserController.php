<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\HelloNotification;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $foo = $request->get('foo');
        $users = User::all();
        return view('user.list')->with(compact('foo','users'));
    }
    
    public function prueba()
    {
        return view('prueba')->with([
            'data' => 'Un dato',
        ]);
    }
    
    public function notify($id) {
        $user = User::find($id);

        if(! $user) {
            abort(404);
        }

        $user->notify(new HelloNotification("Esto es un mensaje arbitrario"));

        // $request->session()->flash('feedback', 'Se ha enviado la notificacion');

        return redirect('/users')->with('feedback', 'Se ha enviado la notificacion');

    }
}
