<?php

namespace App\Http\Controllers\usuario\post;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //publicacion del usuario
    public function index()
    {
        $people = Person::join('characteristics', 'characteristics.person_id', '=', 'people.id')
            ->join('particularities', 'particularities.person_id', '=', 'people.id')
            ->join('countries', 'countries.id', '=', 'people.country_id')
            ->select(
                'people.nombres',
                'people.apellidos',
                'people.edad',
                'people.fecha_suceso',
                'people.lugar_suceso',
                'people.imagen',
                'people.adicional',
                'people.celular',
                'people.id',
                'characteristics.tez',
                'characteristics.cabello',
                'characteristics.ojos',
                'characteristics.nariz',
                'characteristics.boca',
                'characteristics.contextura',
                'characteristics.estatura',
                'characteristics.id as characteristic_id',
                'particularities.vestimenta',
                'particularities.ultima_vista',
                'particularities.observaciones',
                'particularities.id as particularity_id',
                'countries.nombre as pais'
            )->where('people.user_id', '=', Auth::user()->id)->get();

        //dd($people);
        return view('usuario.post.index', [
            'people' => $people
        ]);
    }

    public function show($id)
    {
        $countries = Country::all();
        $data = Person::join('characteristics', 'characteristics.person_id', '=', 'people.id')
            ->join('particularities', 'particularities.person_id', '=', 'people.id')
            ->join('countries', 'countries.id', '=', 'people.country_id')
            ->select(
                'people.nombres',
                'people.apellidos',
                'people.edad',
                'people.fecha_suceso',
                'people.lugar_suceso',
                'people.imagen',
                'people.adicional',
                'people.celular',
                'people.id',
                'characteristics.tez',
                'characteristics.cabello',
                'characteristics.ojos',
                'characteristics.nariz',
                'characteristics.boca',
                'characteristics.contextura',
                'characteristics.estatura',
                'characteristics.id as characteristic_id',
                'particularities.vestimenta',
                'particularities.ultima_vista',
                'particularities.observaciones',
                'particularities.id as particularity_id',
                'countries.id as country_id',
                'countries.nombre as pais'
            )->where('people.id', '=', $id)->first();

        //dd($data);
        return view('usuario.post.show', [
            'data' => $data,
            'countries' => $countries
        ]);
    }
}
