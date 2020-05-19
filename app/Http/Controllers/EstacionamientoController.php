<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estacionamiento;
use App\tipoUsuario;

class EstacionamientoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $aux = new Estacionamiento();
        $estacionamientos = $aux->getDisponibles(session('nivel'));
        return view('Estacionamiento.index')->with(['estacionamientos' => $estacionamientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tipos = new tipoUsuario();
        $t = $tipos->getDisponibles(session('nivel'));
        return view('Estacionamiento.form')->with([
                    'accion' => 'Crear registro',
                    'tipos' => $t
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $auxModel = new Estacionamiento();

        $nombre = $request->input('nombre');
        $ubicacion = $request->input('ubicacion');
        $auxValid = $auxModel->duplicados($nombre, $ubicacion);
        if ($auxValid) {
            session()->flash('mensajeError', 'El nombre o la ubicacion ya han sido registrados');
            return redirect()->action('EstacionamientoController@create');
        }

        $estacionamiento = new Estacionamiento();

        $estacionamiento->nombre_est = $nombre;
        $estacionamiento->ubicacion_est = $ubicacion;
        $estacionamiento->capacidad_max_est = $request->input('maxima');
        $estacionamiento->ocupacion_actual_est = $request->input('actual');
        $estacionamiento->nivel_est = $request->input('nivel');

        $estacionamiento->save();

        $auxValid = $auxModel->duplicados($nombre, $ubicacion);
        session()->flash('mensajeCompleto', 'Se ha actualizado el registro');
        return redirect()->action('EstacionamientoController@show', ['est' => $auxValid->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $acces = null;
        $estacionamiento = Estacionamiento::find($id);
        if (session('nivel') >= 9) {
            $auxT = new tipoUsuario();
            $acces = $auxT->getAcces($estacionamiento->nivel_est);
        }
        return view('Estacionamiento.detalle')->with(['est' => $estacionamiento,
                    'acces' => $acces]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $estacionamiento = Estacionamiento::Find($id);
        $tipos= new tipoUsuario();
        $t = $tipos->getDisponibles(session('nivel'));
        return view('Estacionamiento.form')->with(['e' => $estacionamiento,
            'accion' => 'actualizar registro',
            'tipos' => $t]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $nombre=$request->input('nombre');
        $ubicacion=$request->input('ubicacion');
        
        $auxModel = new Estacionamiento();
        $auxValid = $auxModel->duplicados($nombre, $ubicacion);
        
        if ($auxValid && $auxValid!=$id) {
            session()->flash('mensajeError', 'El nombre o la ubicacion ya han sido registrados');
            return redirect()->action('EstacionamientoController@edit', ['est' => $id]);
        }
        
        $estacionamiento = Estacionamiento::find($id);
        
        $estacionamiento->nombre_est = $nombre;
        $estacionamiento->ubicacion_est = $ubicacion;
        $estacionamiento->capacidad_max_est = $request->input('maxima');
        $estacionamiento->ocupacion_actual_est = $request->input('actual');
        $estacionamiento->nivel_est = $request->input('nivel');

        $estacionamiento->save();
        session()->flash('mensajeCompleto', 'Se ha actualizado el registro');
        return redirect()->action('EstacionamientoController@edit',[ 'est' => $id]);
        //
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
