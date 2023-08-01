<?php

namespace App\Http\Controllers\usuario\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //register index
    public function index()
    {
        return view('usuario.auth.register');
    }

    public function store(Request $request)
    {
        //validaciones
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'email' => 'required|unique:users|email|max:70',
            'password' => 'required|confirmed|min:6|max:30'
        ]);

        //creamos al usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'imagen' => '',
            'password' => Hash::make($request->password) //encriptando
        ]);

        //autenticando al usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //redireccinnado 
        return redirect()->route('home.usuario.index');
    }
}
