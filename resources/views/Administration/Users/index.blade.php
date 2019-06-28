@extends('layouts.app-db')

@section('content')

    <table class="table table-light">
        <thead class="table-dark" >
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
            <th scope="col">Verificado</th>
        </thead>

        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->name }} {{ $admin->lastname }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        @if($admin->isSuper)
                            <span class="badge badge-primary">{{ $admin->type() }}</span>
                        @else
                            <span class="badge badge-secondary">{{ $admin->type() }}</span>
                        @endif
                    </td>
                    <td>
                        @if($admin->isVerified())
                            <span class="badge badge-success">Verificado</span>
                        @else
                            <span class="badge badge-danger">No Verificado</span>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
