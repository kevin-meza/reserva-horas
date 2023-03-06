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
        // return view('asignar_horas/asignar_horas');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listaEspecialistas=Especialista::all();
        print_r($listaEspecialistas);exit;
        return view('asignar_horas/asignar_horas',$listaEspecialistas);
    }

    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
//     {
//         //
//         $horas = request()->except('_token','_method');

//         // print_r($horas);
//         $h=[];
//         foreach ($horas['hora'] as $hora) {
//            array_push($h,['fecha'=>'2023-03-10','fechaF'=>'2023-03-25','hora'=>$hora,'id_especialista'=>1]);
//         }


// horas_disponibles::insert($h); // Eloquent approach
//     }

public function store(Request $request)
{
    $horas = request()->except('_token','_method');

    $datos = [];
    foreach ($horas['hora'] as $hora) {
        $fechaActual = $horas['fecha'];
        while ($fechaActual <= $horas['fechaF']) {
            array_push($datos, [
                'fecha' => $fechaActual,
                'hora' => $hora,
                'id_especialista' => 1
            ]);
            $fechaActual = date('Y-m-d', strtotime($fechaActual . ' +1 day'));
        }
    }

    horas_disponibles::insert($datos);

    return 'Registros agregados correctamente';
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
