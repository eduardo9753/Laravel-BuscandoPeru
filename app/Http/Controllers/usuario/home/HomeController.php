<?php

namespace App\Http\Controllers\usuario\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //VISTA HOME
    public function index()
    {
        return view('usuario.home.index');
    }
}
