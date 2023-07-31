<?php

namespace App\Http\Controllers\visitador\coordenada;

use App\Http\Controllers\Controller;
use App\Models\Coordinate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoordenadaController extends Controller
{
    //guardar coordenada
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitud' => 'required',
            'longitud' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code'  => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $save = Coordinate::insert([
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'person_id' => $request->person_id
            ]);

            if ($save) {
                return response()->json([
                    'code' => 1,
                    'msg' => 'coordenada agregada correctamente'
                ]);
            }
        }
    }

    public function fetchCoordenadas(Request $request)
    {
        $coordiante = Coordinate::join('people', 'people.id', '=', 'coordinates.person_id')
            ->select('*')
            ->where('coordinates.person_id', '=', $request->person_id)->get();

        return response()->json([
            'code' => 1,
            'result' => $coordiante
        ]);
    }
}
