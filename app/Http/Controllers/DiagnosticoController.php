<?php

namespace uno\Http\Controllers;

use Illuminate\Http\Request;

use uno\Http\Requests;
use uno\Paciente;
use uno\Diagnostico;
use uno\Http\Controllers\Controller;
use uno\Enfermedad;
use uno\Sintoma;
use uno\Sintomatologia;
class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pacientes= Paciente::find($id);
        $enfermedades=Enfermedad::get();
        $sintomas=Sintoma::get();
        $sintomatologia=Sintomatologia::get();
        //dd($enfermedades);
        return view('diagnostico')->with('pacientes',$pacientes)->with('enfermedades',$enfermedades)->with('sintomas',$sintomas)->with('sintomatologia',$sintomatologia);
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
        //medico id sacar 
         $diagnostico->codMed=Auth::user()->id;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
