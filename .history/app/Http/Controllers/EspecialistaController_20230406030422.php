<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialista;
use App\Models\Especialidades;
use Illuminate\Support\Facades\Storage;//usar storage
class EspecialistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listaEspecialistas['listaEspecialistas'] = Especialista::join("especialidades", "especialistas.id_especialidad", "=", "especialidades.id")
        ->select("*")
        ->Simplepaginate(1);
        // print_r($listaEspecialistas);exit;
        return view('especialista/index',$listaEspecialistas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listaEspecialidades['listaEspecialidades'] = Especialidades::get();
        return view('especialista/form',$listaEspecialidades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento'=> 'required',
            'rut'=> 'required',
            'id_especialidad' => 'required',

        ]);
        //traemos los datos del especialista desde elpost excepto el token
        $datosEpecialista = request()->except('_token');
        if($request->hasFile('foto')){
            //si hay una imagen la tomamos le ponemos un nombre y la enviamos a carpeta storage
            $datosEpecialista['foto']=$request->file('foto')->store('uploads/ImagenEspecialista','public');
        }
        Especialista::insert($datosEpecialista);

        $listaEspecialistas['listaEspecialistas'] = Especialista::join("especialidades", "especialistas.id_especialidad", "=", "especialidades.id")
        ->select("*")
        ->paginate(10);
        // print_r($listaEspecialistas);exit;
        return view('especialista.index',$listaEspecialistas);
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
    public function edit( $id)
    {
        $especialistaEdit=Especialista::findOrFail($id);
        return view('especialista.edit',compact('especialistaEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //


        $datosEditEspe = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            //si hay una imagen la tomamos le ponemos un nombre y la enviamos a carpeta storage
            $especialista=Especialista::findOrFail($id);
            Storage::delete('public/'.$especialista->foto);

            $datosEditEspe['foto']=$request->file('foto')->store('uploads/ImagenEspecialista','public');
        }
//         print_r($datosEditProducto);
// exit;

        Especialista::where('id_especialista','=',$id)->update($datosEditEspe);
        // $datosEditEspe=Especialista::findOrFail($id);

        $listaEspecialistas['listaEspecialistas'] = Especialista::join("especialidades", "especialistas.id_especialidad", "=", "especialidades.id")
        ->select("*")
        ->Simplepaginate(10);
        // print_r($listaEspecialistas);exit;
        // return view('especialista/index',$listaEspecialistas);
        return redirect()->route('especialista.index')->with(['mensaje' => 'Especialista Editado']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Especialista::destroy($id);

        $listaEspecialistas['listaEspecialistas'] = Especialista::leftjoin("especialidades", "especialistas.id_especialidad", "=", "especialidades.id")
        ->select("*")
        ->get();
        // print_r($listaEspecialistas);exit;
        return view('especialista/index',$listaEspecialistas);

    }
}
