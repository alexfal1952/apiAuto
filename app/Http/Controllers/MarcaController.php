<?php

namespace App\Http\Controllers;

use App\Http\Resources\MarcaResource;
use App\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         return MarcaResource::collection( marca::all());
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
        $request->validate([
            'marca' => 'required|string'
        ]);
        $marca = new marca();
        $marca -> marca = $request->marca;
        $marca -> save();
        return new MarcaResource($marca);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = marca::find($id);
        return new MarcaResource($marca);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'marca' => 'required|string'
        ]);
        $marca = marca::find($id);
        $marca ->marca = $request->marca;
        $marca->save();
        return new MarcaResource($marca);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = marca::find($id);
        $marca->delete();
        return new MarcaResource($marca);
    }
}
