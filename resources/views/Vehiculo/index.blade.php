@extends('layout.master')


@section('contenido')

<table class="mostrarDatos">
    <thead>
        <tr>
            <td>
                Placa
            </td>
            <td>
                tipo
            </td>
            <td>
                color
            </td>
            <td>
                usuario
            </td>
        </tr>
    </thead>
    <tbody>
@foreach($vehiculos as $vehiculo)
<tr>
    <td>
        {{$vehiculo->placa_veh}}
    </td>
    <td>
        {{$vehiculo->tipo_veh}}
    </td>
    <td>
        {{$vehiculo->color_veh}}
    </td>
    <td>
        <a href="{{action('UsuarioController@show', ['us' => $vehiculo->codigo_user] )}}"> {{$vehiculo->codigo_user}}</a>
    </td>
</tr>
@endforeach
</tbody>
</table>


@stop

