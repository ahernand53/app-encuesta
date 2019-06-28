@extends('layouts.app-db')

@section('content')

    <table class="table table-light">
        <thead class="table-dark">
            <th class="col">Nombre</th>
            <th class="col">Email</th>
            <th class="col">Telefono</th>
            <th class="col">Departamento</th>
            <th class="col">Ciudad</th>
            <th class="col">Encuesta</th>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }} {{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->department }}</td>
                <td>{{ $user->city }}</td>
                <td>
                    @if($user->survey_made)
                        <span class="badge badge-success"><i class="fas fa-check"></i></span>
                    @else
                        <span class="badge badge-danger"><i class="fas fa-times"></i></span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection