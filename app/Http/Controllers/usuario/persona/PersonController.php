<?php

namespace App\Http\Controllers\usuario\persona;

use App\Http\Controllers\Controller;
use App\Models\Characteristic;
use App\Models\Particularity;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image; //AJUTE DE LAS FOTOS
use Illuminate\Support\Str;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //vista para registrar una persona 
    public function index()
    {
        return view('usuario.persona.index');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required',
            'fecha_suceso' => 'required',
            'lugar_suceso' => 'required|string',
            'imagen' => 'required',
            'adicional' => 'required|string',

            'tez' => 'required|string',
            'cabello' => 'required|string',
            'ojos' => 'required|string',
            'nariz' => 'required|string',
            'boca' => 'required|string',
            'contextura' => 'required|string',
            'estatura' => 'required',

            'vestimenta' => 'required|string',
            'ultima_vista' => 'required|string',
            'observaciones' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            //guardando persona
            if ($request->has('imagen')) {
                $imagen = $request->file('imagen'); //NOMBRE DEL INPUT
                $nombreImagen = Str::uuid() . "." . $imagen->extension(); //DANDOLE UN ID UNICO A LA IMAGEN

                $imagenServidor = Image::make($imagen);
                $imagenServidor->fit(800, 800);

                $imagenPath = public_path('personas') . "/" . $nombreImagen;
                $upload = $imagenServidor->save($imagenPath);

                if ($upload) {
                    $person = Person::create([
                        'nombres' => $request->nombres,
                        'apellidos' => $request->apellidos,
                        'edad' => $request->edad,
                        'fecha_suceso' => $request->fecha_suceso,
                        'lugar_suceso' => $request->lugar_suceso,
                        'imagen' => $nombreImagen,
                        'adicional' => $request->adicional,
                        'country_id' => 1,
                        'state_id' => 1,
                        'user_id' => Auth::user()->id
                    ]);

                    if ($person) {
                        //guardando caracteristicas
                        $save = Characteristic::create([
                            'tez' => $request->tez,
                            'cabello' => $request->cabello,
                            'ojos' => $request->ojos,
                            'nariz' => $request->nariz,
                            'boca' => $request->boca,
                            'contextura' => $request->contextura,
                            'estatura' => $request->estatura,
                            'person_id' => $person->id
                        ]);

                        if ($save) {
                            //guardando particularidades
                            Particularity::create([
                                'vestimenta' => $request->vestimenta,
                                'ultima_vista' => $request->ultima_vista,
                                'observaciones' => $request->observaciones,
                                'person_id' => $person->id
                            ]);

                            return response()->json([
                                'code' => 1,
                                'msg' => 'Datos Guardados Correctamente'
                            ]);
                        }
                    }
                } else {
                    return response()->json([
                        'code' => 0,
                        'msg' => 'El archivo no se pudo subir, verifique la extensión'
                    ]);
                }
            }
        }
    }
}
