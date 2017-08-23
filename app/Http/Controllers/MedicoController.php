<?php

namespace uno\Http\Controllers;

use Illuminate\Http\Request;

use uno\Http\Requests;
use uno\Http\Controllers\Controller;
use uno\User;
class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registromed');
    }
    public function registrar(Request $request)
    {
        $usuario= new User();
        $usuario->nomUsu= $request->input('nomusu');
        $usuario->apeUsu= $request->input('apausu').' '.$request->input('amausu');
        $usuario->ciUsu= $request->input('ciusu');
        $usuario->expUsu= $request->input('expusu');
        $usuario->fecUsu= $request->input('fecusu');
        $usuario->nickUsu= $request->input('nickusu');
        $usuario->password= bcrypt($request->input('pass'));
        $usuario->save();
                $mensaje="Medico registrado correctamente";
        return view('inicio')->with('mensaje',$mensaje);
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
        //
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
