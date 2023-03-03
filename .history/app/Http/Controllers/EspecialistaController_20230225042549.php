<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('especialista/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('especialista/form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //traemos los datos del especialista desde elpost excepto el token
        $datosEpecialista = request()->except('_token');
        print_r($datosEpecialista)
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
