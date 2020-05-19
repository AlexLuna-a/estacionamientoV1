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
                
            </td>
            <td>
                {{$usuario->apellido_p_user}} {{$usuario->apellido_m_user}} {{$usuario->nombre_user}}
            </td>
        </tr>
</tbody>
</table>

@stop