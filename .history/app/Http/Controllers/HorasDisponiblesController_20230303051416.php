<?php

namespace App\Http\Controllers;
use App\Models\Especialista;
use App\Models\horas_disponibles;
use Illuminate\Http\Request;

class HorasDisponiblesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listaEspecialistas['listaEspecialistas'] = Especialista::get();
        return view('horas_disponibles/index',$listaEspecialistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }
    public function buscar(Request $request){
        $id_especialista = request()->except('_token');
       $listaHorasXrut['listaHorasXrut'] = horas_disponibles::get();

         print_r($listaHorasXrut);

    }
}
