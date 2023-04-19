<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horas_disponibles;
use App\Models\Especialista;
class AsignarHorasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // //
        $listaEspecialistas['listaEspecialistas'] = Especialista::join("especialidades", "especialistas.id_especialidad", "=", "especialidades.id")
        ->select("*")
        ->get();
        // return redirect()->route('asignar_horas.create')->with(['mensaje' => 'Especialista Editado'],$listaEspecialistas);
        return view('asignar_horas/asignar_horas',$listaEspecialistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listaEspecialistas['listaEspecialistas'] = Especialista::join("especialidades", "especialistas.id_especialidad", "=", "especialidades.id")
        ->select("*")
        ->get();
        // print_r($listaEspecialistas);exit;
        return view('asignar_horas/asignar_horas',$listaEspecialistas);
    }

    /**
     * Store a newly created resource in storage.
     */


public function store(Request $request)
{

    $request->validate([
        'fecha' => 'required|date|min:'.$request,
        'fechaF' => 'required|date',


    ]);
    $horas = request()->except('_token','_method');

    $datos = [];
    foreach ($horas['hora'] as $hora) {
        $especialista = $horas['id_especialista'];
        $fechaActual = $horas['fecha'];
        while ($fechaActual <= $horas['fechaF']) {
            array_push($datos, [
                'fecha' => $fechaActual,
                'hora' => $hora,
                'id_especialista' => $especialista
            ]);
            $fechaActual = date('Y-m-d', strtotime($fechaActual . ' +1 day'));
        }
    }

    horas_disponibles::insert($datos);

    // return 'Registros agregados correctamente';
    return redirect()->route('asignar_horas.index')->with(['mensaje' => 'Horas Asignadas al Especialista id:'.$especialista]);
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
