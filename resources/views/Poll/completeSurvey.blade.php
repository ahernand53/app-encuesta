@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Ha realizado la encuesta correctamente</h5>
                    <p class="card-text">Gracias por colaborar en nuestra ficha de caracterizacion</p>
                    <a href="{{ route('welcome') }}" class="btn btn-primary">Inicio</a>
                </div>
            </div>
        </div>

    </div>


@endsection