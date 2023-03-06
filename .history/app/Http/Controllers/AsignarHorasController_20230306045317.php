<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horas_disponibles;
class AsignarHorasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // //
        // return view('asignar_horas/asignar_horas');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('asignar_horas/asignar_horas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $horas = request()->except('_token','_method');

        // print_r($horas);
        $h=[];
        foreach ($horas['hora'] as $hora) {
           array_push($h,['fecha'=>null,'hora'=>$hora,'id_especialista'=>1]);
        }

print_r($h);
horas_disponibles::insert($h); // Eloquent approach
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
}
