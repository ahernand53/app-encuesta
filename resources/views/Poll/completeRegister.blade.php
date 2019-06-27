@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Se ha registrado exitosamente</h5>
                    <p class="card-text">Por favor verifica tu correo electronico para realizar la encuesta.</p>
                    <a href="{{ route('welcome') }}" class="btn btn-primary">Inicio</a>
                </div>
            </div>
        </div>

    </div>

@endsection
