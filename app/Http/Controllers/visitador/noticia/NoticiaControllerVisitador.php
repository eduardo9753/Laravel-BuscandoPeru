<?php

namespace App\Http\Controllers\visitador\noticia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticiaControllerVisitador extends Controller
{
    //vista de las noticias
    public function index()
    {
        return view('visitador.index');
    }
}
