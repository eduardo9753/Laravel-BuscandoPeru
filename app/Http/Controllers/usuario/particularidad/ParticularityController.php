<?php

namespace App\Http\Controllers\usuario\particularidad;

use App\Http\Controllers\Controller;
use App\Models\Particularity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticularityController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //actualizar
    public function update(Request $request)
    {
        $particularity_id = $request->particularidad_id;
        $data = Particularity::find($particularity_id);

        $validator = Validator::make($request->all(), [
            'vestimenta' => 'required|string',
            'ultima_vista' => 'required|string',
            'observaciones' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data->update([
                'vestimenta' => $request->vestimenta,
                'ultima_vista' => $request->ultima_vista,
                'observaciones' => $request->observaciones
            ]);

            return response()->json([
                'code' => 1,
                'msg' => 'Datos Actualizados'
            ]);
        }
    }
}
