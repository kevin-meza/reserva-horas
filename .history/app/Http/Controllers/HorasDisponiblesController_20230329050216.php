<?php

namespace App\Http\Controllers;
use App\Models\Especialista;
use App\Models\Especialidades;
use App\Models\horas_disponibles;
use Illuminate\Http\Request;

use App\Models\reservas;
class HorasDisponiblesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $listaEspecialidades['listaEspecialidades'] = Especialidades::get();


        $listaEspecialistas['listaEspecialistas'] = Especialista::join("especialidades", "especialistas.id_especialidad", "=", "especialidades.id")
        ->select("*")
        ->Simplepaginate(15);

        return view('horas_disponibles/index',$listaEspecialistas,$listaEspecialidades);
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
        $id_fecha = $_POST['id_fecha'];
        $id_especialista = $_POST['id_especialista'];
        $id_especialidad =$_POST['id_especialidad'];
        $rut = $_POST['rut'];
        $datos=[ $id_fecha, $id_especialista,$id_especialidad,$rut];
        reservas::insert();
        print_r($id_fecha.$rut. $id_especialista .$id_especialidad);
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
       //  $listaHorasXrut['listaHorasXrut'] = horas_disponibles::where('id_especialista','=',$id_especialista)->get();
        // print_r($id_especialista)


        $listaHorasXrut['listaHorasXrut'] = horas_disponibles::join('especialistas', 'horas_disponibles.id_especialista', '=', 'especialistas.id_especialista')->
        where('horas_disponibles.id_especialista','=',$id_especialista)->get();
        // print_r($listaHorasXrut);
       return view('horas_disponibles/horas_especialista',$listaHorasXrut);


    }
    public function buscarxDia(Request $request){
        $fecha = request()->except('_token');
        $id_especialidad = request()->id_especialidad;
    //    $listaHorasxDia['listaHorasxDia'] = horas_disponibles::whereDate('fecha',$fecha)->where('id_estado', 1)
    //    ->get();

    // $listaHorasxDia['listaHorasxDia'] = horas_disponibles::join('especialistas', 'horas_disponibles.id_especialista', '=', 'especialistas.id_especialista')
    // ->whereDate('fecha',$fecha)->where('id_estado', 1)
    //    ->select('horas_disponibles.*', 'especialistas.nombre')
    //    ->get();


    //     print_r($id);exit;


        $listaHorasxDia['listaHorasxDia'] = horas_disponibles::join('especialistas', 'horas_disponibles.id_especialista', '=', 'especialistas.id_especialista')
    ->join('especialidades', 'especialistas.id_especialidad', '=', 'especialidades.id')
    ->whereDate('fecha', $fecha)
    ->where('id_estado', 1)
    ->where('especialidades.id', $id_especialidad)
    ->select('horas_disponibles.*', 'especialistas.nombre')
    ->get();

    // print_r($listaHorasxDia);exit;
  return view('horas_disponibles/horas_dia',$listaHorasxDia);


    }

    // public function asignarHoras(){
    //     return view('asignar_horas/asignar_horas');
    // }

    // public function ingresarHoras(Request $request){
    //    echo "hola";
    // }


}
