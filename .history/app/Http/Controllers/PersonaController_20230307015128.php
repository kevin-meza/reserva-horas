<?php

namespace App\Http\Controllers;

use App\Models\persona;
// use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listaPersonas['listaPersonas'] = Persona::paginate(5);


        return view('persona/index',$listaPersonas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'rut'=> 'required',
            'email' => 'required',

        ]);

        $datosPersona = request()->except('_token');
        // print_r($datosPersona);
         persona::insert($datosPersona);
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
    public function edit($id)
    {
        //
        $persona=persona::findOrFail($id);
        return view('persona.edit',compact('persona'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $datosPersonaEdit = request()->except(['_token','_method']);

        persona::where('id','=',$id)->update($datosPersonaEdit);
        return redirect('persona')->with('mensaje','Persona Modificada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        persona::destroy($id);
        return redirect('persona')->with('mensaje','Persona Eliminada');
    }
}
