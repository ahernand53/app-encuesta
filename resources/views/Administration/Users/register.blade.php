@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">

            @if($errors->has('message'))
                <div class="alert alert-danger" role="alert">
                    Las contrasenas no coinciden
                </div>
            @endif

            <div class="card-header">
                <h3>Completa el registro</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('usuarios.confirm') }}">
                    @csrf
                    @method('post')
                    <input type="hidden" name="id" value="{{ $admin->id }}">

                    <div class="form-group">
                        <label for="password">Contrasena</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="c_password">Confirmar Contrasena</label>
                        <input type="password" class="form-control" id="c_password" name="password_confirmation">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Guardar">

                </form>
            </div>
        </div>
    </div>

@endsection
