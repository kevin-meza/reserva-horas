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
        // $listaEspecialistas['listaEspecialistas'] = Especialista::get();
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
       $listaHorasXrut['listaHorasXrut'] = horas_disponibles::where('id_especialista','=',$id_especialista)->get();
        // print_r($id_especialista);

       return view('horas_disponibles/horas_especialista',$listaHorasXrut);
         print_r($listaHorasXrut);

    }
    public function buscarxDia(Request $request){
        $fecha = request()->except('_token');
    //    $listaHorasxDia['listaHorasxDia'] = horas_disponibles::whereDate('fecha',$fecha)->where('id_estado', 1)
    //    ->get();

    $listaHorasxDia['listaHorasxDia'] = horas_disponibles::join('especialistas', 'horas_disponibles.id_especialista', '=', 'especialistas.id_especialista')
    ->whereDate('fecha',$fecha)->where('id_estado', 1)
       ->select('horas_disponibles.*', 'especialistas.nombre')
       ->get();
        // print_r($listaHorasxDia);

  return view('horas_disponibles/horas_dia',$listaHorasxDia);


    }

    public function asignarHoras(){
        return view('asignar_horas/asignar_horas');
    }

    public function ingresarHoras(Request $request){
       echo "hola";
    }


}
