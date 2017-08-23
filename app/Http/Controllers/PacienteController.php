<?php

namespace uno\Http\Controllers;

use Illuminate\Http\Request;
use uno\Paciente;
use uno\Http\Requests;
use uno\Http\Controllers\Controller;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$diagnostico = Diagnostico::find($id2);

        //foreach($diagnostico as $diag)
        //{
          //  if($diag->pregunta1)
            //{
              //  $con=$con+      XD index($id2)
            //}
        //}
        return view('registropac');
    }
    public function listar()
    {
        $pacientes= Paciente::get();
        return view('listapacientes')->with('pacientes',$pacientes);
    }
     public function registrar(Request $request)
    {
        
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
        $pacientes= new Paciente();
        $pacientes->nomPac= $request->input('nombrepac');
        $pacientes->apePac= $request->input('paternopac').' '.$request->input('maternopac');
        $pacientes->fecPac= $request->input('fechapac');
        $pacientes->genPac= $request->input('sexpac');
        $pacientes->ciPac= $request->input('carnetpac');
        $pacientes->expPac= $request->input('expac');
        $pacientes->telPac= $request->input('telefonopac');
        $pacientes->ocuPac= $request->input('ocupacionpac');
        $pacientes->dirPac= $request->input('direccionpac');
        $pacientes->save();
                $mensaje="Paciente registrado";
        return view('registropac')->with('mensaje',$mensaje);
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
