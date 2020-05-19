@extends('layout.master')

@section('menu')


@stop

@section('contenido')

<table class="mostrarDatos">
    <thead>
    </thead>
    <tbody>
        <tr>
            <td>
                Codigo
            </td>
            <td>
                {{$usuario->id}}
            </td>
        </tr>
        <tr>
            <td>
                Nombre
            </td>
            <td>
                {{$usuario->apellido_p_user}} {{$usuario->apellido_m_user}} {{$usuario->nombre_user}}
            </td>
        </tr>
        <tr>
            <td>
                Fecha de ingreso
            </td>
            <td>
                {{$usuario->fecha_ingreso_user}}
            </td>
        </tr>
        <tr>
            <td>
                Vigencia
            </td>
            <td>
                {{$usuario->vigencia_user}}
            </td>
        </tr>
        <tr>
            <td>
                Rol
            </td>
            <td>
                {{$tipo}}
            </td>
        </tr>
</tbody>
<a href="{{action('UsuarioController@edit', ['us'=> $usuario->id ])}}">Editar</a>
</table>

@stop