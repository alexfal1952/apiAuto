<?php

namespace App\Http\Controllers;

use App\TipoNoticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TipoNoticia\TipoNoticiaResource;
use App\Http\Resources\TipoNoticia\TipoNoticiasResource;




class TipoNoticiaController extends Controller
{
    public function index()
    {
        $tipoNoticia = TipoNoticia::query();
        return new TipoNoticiasResource($tipoNoticia->get());
       /*  dd($tipoNoticia->get()); */
    }

    public function prueba($numero=0)
    {
        return $numero;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->input(), [
            'tipo' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $tipoNoticia = new TipoNoticia();
        $tipoNoticia->tipo = $request->tipo;
        $tipoNoticia->save();
        /* dd($tipoNoticia->first()); */
        return new TipoNoticiaResource($tipoNoticia);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        $validator = Validator::make(request()->input(), [
            'tipo' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
    }

    public function destroy($id)
    {
        //
    }
}
