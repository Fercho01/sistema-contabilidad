@extends('admin.master')
@section('container')
    <h1 style="display: inline-block">Bitácora</h1>
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">Usuario</th>
                <th scope="col">Acción</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach (getBitacora() as $bitacora)
                <tr>
                    <th scope="row">{{ $bitacora->user->name }}</th>
                    <td>{{ $bitacora->accion }}</td>
                    <td>{{ $bitacora->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
