<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialista;
use App\Models\Especialidades;
class EspecialistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listaEspecialistas['listaEspecialistas'] = Especialista::leftjoin("especialidades", "especialidades.id", "=", "Especialistas.id_especialidad")
        ->select("*")
        ->get();
        // print_r($listaEspecialistas);exit;
        return view('especialista/index',$listaEspecialistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listaEspecialidades['listaEspecialidades'] = Especialidades::get();
        return view('especialista/form',$listaEspecialidades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //traemos los datos del especialista desde elpost excepto el token
        $datosEpecialista = request()->except('_token');
        Especialista::insert($datosEpecialista);

        $listaEspecialistas['listaEspecialistas'] = Especialista::innerjoin("especialidades", "especialistas.id_especialidad", "=", "Especialidades.id_especialidad")
        ->select("*")
        ->get();
        // print_r($listaEspecialistas);exit;
        return view('especialista/index',$listaEspecialistas);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Especialista::destroy($id);
        return redirect('especialista.index')->with('mensaje','Persona Eliminada');
    }
}
