<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Periodo;
use App\CursoAlumno;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Periodo::all();  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $periodo= Periodo::all();
        if(count($periodo)!=0){
            $objeto = Periodo::find($periodo->last()->id);
            $objeto->estado = false;
            $objeto->save();
        }
        $dato = new Periodo();
        $dato->ano = $request->ano;
        $dato->fechaInicio = $request->fechaInicio;
        $dato->fechaFin = $request->fechaFin;
        $dato->estado = true;
        $dato->save();
        return $dato;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $dato = Periodo::find($id);
        $
        ->ano = $request->ano;
        $dato->fechaInicio = $request->fechaInicio;
        $dato->fechaFin = $request->fechaFin;
        $dato->estado = $request->estado;
        $dato->save();
        return $dato;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if( count( CursoAlumno::where('periodo_id',$id)->get() )==0){
            $dato = Periodo::find($id);
            $dato->delete();
            $mensaje="ok";
        }else{
            $mensaje="error";
        }
        return $mensaje;
    }
}
