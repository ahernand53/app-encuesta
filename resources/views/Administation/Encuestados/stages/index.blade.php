@extends('layouts.app-db')

@section('content')
    <a href="/dashboard/formulario/stages/create">Nuevo</a>

    <table class="table">
        <thead>
            <th class="col">Titulo</th>
            <th class="col">Descripcion</th>
        </thead>

        <tbody>
            @foreach($stages as $stage)
                <tr class="row">
                    <td>{{ $stage->title }}</td>
                    <td>{{ $stage->description }}</td>
                    <td>
                        <a href="/dashboard/formulario/stages/{{$stage->id}}/edit">Editar</a>
                    </td>
                    <td>
                        <a href="{{  url('/dashboard/formulario/stages', [$stage->id])}}  " class="btn btn-danger" data-method="delete" data-confirm="Are you sure?">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection


