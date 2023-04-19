<?php

namespace App\Http\Controllers;
use App\Models\Especialista;
use App\Models\Especialidades;
use App\Models\horas_disponibles;
use Illuminate\Http\Request;
use App\Models\persona;

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
        //falta cambiar el esatdo de la hora_disponible
        //
        //
        //
        $rut = $_POST['rut'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $fecha=$_POST['fecha_nacimiento'];

        $persona=['nombre'=>$nombre,'apellido'=>$apellido,'rut'=>$rut,'fecha_nacimiento'=>$fecha];

        $existencia=persona::where('rut', $rut)->value('id');
        $id_persona=$existencia;
        //busca si el rut existe
            if (isset($existencia)) {
                $id_fecha = $_POST['id_fecha'];
                $id_especialista = $_POST['id_especialista'];
                $id_especialidad =$_POST['id_especialidad'];
                $rut = $_POST['rut'];

                $datos=[
                    'id_fecha'=>$id_fecha,
                    'id_persona'=>$id_persona,
                    'id_especialidad'=>$id_especialidad,
                    'id_especialista'=>$id_especialista
                ];
                 reservas::insert($datos);

                    $estado_hora = horas_disponibles::find($id_fecha);
                    $estado_hora->id_estado = 2;
                    $estado_hora->save();

                    echo("reserva realizada");
            }else{

                persona::insert($persona);

        $id_persona = persona::where('rut', $rut)->value('id');
        $id_fecha = $_POST['id_fecha'];
        $id_especialista = $_POST['id_especialista'];
        $id_especialidad =$_POST['id_especialidad'];
        $rut = $_POST['rut'];

        $datos=[
            'id_fecha'=>$id_fecha,
            'id_persona'=>$id_persona,
            'id_especialidad'=>$id_especialidad,
            'id_especialista'=>$id_especialista
        ];
         reservas::insert($datos);

         $estado_hora = horas_disponibles::find($id_fecha);
         $estado_hora->id_estado = 2;
         $estado_hora->save();
         echo("reserva realizada");
    }


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
        where('horas_disponibles.id_especialista','=',$id_especialista)->where('horas_disponibles.id_estado','!=',2)->get();
        // print_r($listaHorasXrut);
       return view('horas_disponibles/horas_especialista',$listaHorasXrut);


    }
    public function buscarxDia(Request $request){
        $fecha = request()->except('_token');
        $id_especialidad = request()->id_especialidad;



        $listaHorasxDia['listaHorasxDia'] = horas_disponibles::join('especialistas', 'horas_disponibles.id_especialista', '=', 'especialistas.id_especialista')
    ->join('especialidades', 'especialistas.id_especialidad', '=', 'especialidades.id')
    ->whereDate('fecha', $fecha)
    ->where('id_estado', 1)
    ->where('horas_disponibles.id_estado','!=',2)
    ->where('especialidades.id', $id_especialidad)
    ->select('horas_disponibles.*', 'especialistas.nombre')
    ->get();

    $id_es['id']=$id_especialidad;
    // print_r($listaHorasxDia);exit;
  return view('horas_disponibles/horas_dia',$listaHorasxDia,$id_es);


    }

    // public function asignarHoras(){
    //     return view('asignar_horas/asignar_horas');
    // }

    // public function ingresarHoras(Request $request){
    //    echo "hola";
    // }


}
