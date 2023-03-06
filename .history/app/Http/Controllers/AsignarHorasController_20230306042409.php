<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $horas = request()->except('_token');
        $datos=['hora'=>$horas];
        print_r($horas);
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
