@extends('layouts.app-db')

@section('content')

    <table class="table">
        <thead>
        <th class="col">Nombre</th>
        <th class="col">Email</th>
        <th class="col">Telefono</th>
        <th class="col">Departamento</th>
        <th class="col">Ciudad</th>
        <th class="col">Encuesta</th>

        </thead>

        <tbody>
        @foreach($users as $user)
            <tr class="row">
                <td>{{ $user->name }} {{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->department }}</td>
                <td>{{ $user->city }}</td>
                <td>
                    @if($user->madeSurvey)
                        <span class="badge badge-success">SI</span>
                    @else
                        <span class="badge badge-danger">NO</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection