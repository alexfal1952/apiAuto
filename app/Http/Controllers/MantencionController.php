<?php

namespace App\Http\Controllers;

use App\Http\Resources\MantecionResour;
use App\Http\Resources\MarcaResource;
use App\Mantencion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MantencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MantecionResour::collection(Mantencion::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make(request()->input(), [
            'descripcion' => 'required|unique:mantencions',
            'kilometraje' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $mantencion = new Mantencion();
        $mantencion->descripcion = $request->descripcion;
        $mantencion->kilometraje = $request->kilometraje;
        $mantencion->save();
        return new MantecionResour($mantencion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mantencion  $mantencion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mantencion = Mantencion::find($id);
        return new MantecionResour($mantencion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mantencion  $mantencion
     * @return \Illuminate\Http\Response
     */
    public function edit(Mantencion $mantencion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mantencion  $mantencion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = validator::make(request()->input(), [
            'kilometraje' => 'numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $mantencion = Mantencion::find($id);
        ($mantencion->descripcion ==  $request->descripcion) ? : $mantencion->descripcion = $request->descripcion;
        $mantencion->kilometraje = $request->kilometraje;
        $mantencion->save();
        return new MarcaResource($mantencion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mantencion  $mantencion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantencion $mantencion)
    {
        //
    }
}
