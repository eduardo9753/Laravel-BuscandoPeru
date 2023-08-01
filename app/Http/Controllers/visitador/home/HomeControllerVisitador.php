<?php

namespace App\Http\Controllers\visitador\home;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class HomeControllerVisitador extends Controller
{
    //home "lista de personas desaparecidas"
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
                'countries.nombre as pais',
                'countries.codigo'
            )->orderBy('people.id', 'desc')->simplePaginate(9);

            //dd($people);
        return view('visitador.home.index',[
            'people' => $people
        ]);
    }

    public function show($id)
    {
        $person = Person::join('characteristics', 'characteristics.person_id', '=', 'people.id')
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
        )->where('people.id','=',$id)->first();

        return view('visitador.home.show',[
            'person' => $person
        ]);
    }
}
