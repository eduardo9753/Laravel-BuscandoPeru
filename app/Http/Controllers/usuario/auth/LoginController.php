<?php

namespace App\Http\Controllers\usuario\auth; //RUTA DE LA CARPETA DEL CONTROLADOR CREADO

use App\Http\Controllers\Controller; //EXTENSION DEL CONTROLLADOR GENERAL
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //login
    public function index()
    {
        return view('usuario.auth.login');
    }

    //store login
    public function store(Request $request)
    {
        //validaciones
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //autenticando con la base de datos
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Tus credenciales estan incorrectas');
        }

        //redireccionando al perfil del usuario
        return redirect()->route('home.usuario.index');
    }
}
