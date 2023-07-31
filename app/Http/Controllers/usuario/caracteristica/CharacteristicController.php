<?php

namespace App\Http\Controllers\usuario\caracteristica;

use App\Http\Controllers\Controller;
use App\Models\Characteristic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CharacteristicController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //actualizar
    public function update(Request $request)
    {
        $characteristic_id = $request->caracteristica_id;
        $data = Characteristic::find($characteristic_id);

        $validator = Validator::make($request->all(), [
            'tez' => 'required|string',
            'cabello' => 'required|string',
            'ojos' => 'required|string',
            'nariz' => 'required|string',
            'boca' => 'required|string',
            'contextura' => 'required|string',
            'estatura' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $data->update([
                'tez' => $request->tez,
                'cabello' => $request->cabello,
                'ojos' => $request->ojos,
                'nariz' => $request->nariz,
                'boca' => $request->boca,
                'contextura' => $request->contextura,
                'estatura' => $request->estatura,
            ]);

            return response()->json([
                'code' => 1,
                'msg' => 'Datos Actualizados'
            ]);
        }
    }
}
