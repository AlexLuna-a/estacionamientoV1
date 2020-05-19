<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\tipoUsuario;

class UsuarioController extends Controller {

    //vista de loggin
    public function loggin() {
        return view('Usuario.loggin');
    }

    //finalizar sesion
    public function loggout() {
        if (!isLog()) {
            return redirect()->action('UsuarioController@loggin');
        }
        session()->flush();
        return redirect()->action('UsuarioController@index');
    }

    //Validar inicio de sesion
    public function loggin_in(Request $request) {
        $codigo = $request->input('codigo_user');
        $pass = $request->input('password_user');
        $usuario = Usuario::find($codigo);

        if ($usuario) {
            if ($codigo == $usuario->id &&
                    $pass == $usuario->password_user) {
                session()->put(['usuario' => $usuario]);
                session()->put(['nivel' => $usuario->tipo->nivel_tipo]);
                return redirect()->action('UsuarioController@index');
            } else {
                $mensaje = 'el usuario y/o la contraseña no coinciden, intentalo de nuevo';
            }
        } else {
            $mensaje = 'no se reconoce el usuario';
        }
        if ($mensaje) {
            session()->flash('mensaje', $mensaje);
            return redirect()->action('UsuarioController@loggin');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (!isLog()) {
            return redirect()->action('UsuarioController@loggin');
        }
        return view('Usuario.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //crear usuario
    public function create() {
        $tipHelp = new tipoUsuario();
        $tipos = $tipHelp->getDisponibles();
        if (!session()->exists('vigencia')) {
            $vigencia = date("y-m-d", strtotime('last day of December', time()));
            session()->put('vigencia', $vigencia);
        }
        return view('Usuario.formCU', ['tipos' => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Almacenar un nuevo usuario
    public function store(Request $request) {
        $usuario = new Usuario;

        $usuario->id = $request->input('codigo_user');
        $usuario->password_user = $request->input('password');
        $usuario->apellido_p_user = $request->input('apellidoP');
        $usuario->apellido_m_user = $request->input('apellidoM');
        $usuario->nombre_user = $request->input('nombre');
        $usuario->clave_tipo = $request->input('tipo');
        $usuario->fecha_ingreso_user = $request->input('ingreso');
        $usuario->vigencia_user = $request->input('vigencia');
        
        
        $codigo = $request->input('codigo_user');
        $us = Usuario::find($codigo);
        if (is_object($us)) {
            session()->flash('mensajeError', 'Error! El codigo le pertenece a otro usuario');
            $tipHelp = new tipoUsuario();
            $tipos = $tipHelp->getDisponibles();
            return view('Usuario.formCU', [
                'usuario' => $usuario,
                'tipos' => $tipos
                ]);
        }

        session()->put(['nivel' => $usuario->tipo->nivel_tipo]);
        session()->put(['usuario' => $usuario]);
        $usuario->save();
        session('usuario')->id = $codigo;
        return redirect()->action('UsuarioController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($us) {
        if (!isLog()) {
            return redirect()->action('UsuarioController@loggin');
        }
        $usuario = Usuario::find($us);
        return view('pruebas')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($us) {
        if (!isLog()) {
            return redirect()->action('UsuarioController@loggin');
        }
        $usuario = Usuario::find($us);
        $tipHelp = new tipoUsuario();
        if (session('usuario')->id != $usuario->id) {
            $tipos = $tipHelp->getDisponibles(10);
        } else {
            $tipos = $tipHelp->getDisponibles($usuario->tipo->nivel_tipo);
        }
        return view('usuario.formCU', [
            'accion' => 'Actualiza tu informacion',
            'tipos' => $tipos,
            'usuario' => $usuario
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $us) {
        if (!isLog()) {
            return redirect()->action('UsuarioController@loggin');
        }

        $codigo = $request->input('codigo_user');

        if ($us != $codigo) {
            $usuario = Usuario::find($codigo);
            if (is_object($usuario)) {
                session()->flash('mensajeError', 'Error! El codigo le pertenece a otro usuario');
                return redirect()->action('UsuarioController@edit', ['us' => $us]);
            }
        }
        $usuario = Usuario::find($us);
        $usuario->id = $codigo;
        $usuario->password_user = $request->input('password');
        $usuario->apellido_p_user = $request->input('apellidoP');
        $usuario->apellido_m_user = $request->input('apellidoM');
        $usuario->nombre_user = $request->input('nombre');
        $usuario->clave_tipo = $request->input('tipo');
        $usuario->fecha_ingreso_user = $request->input('ingreso');
        $usuario->vigencia_user = $request->input('vigencia');

        $usuario->save();
        if (session('usuario')->id == $us) {
            session()->put(['usuario' => $usuario]);
        }

        session()->flash('mensajeCompleto', 'Se han guardado los cambios');
        return redirect()->action('UsuarioController@edit', ['us' => $usuario->id]);
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
