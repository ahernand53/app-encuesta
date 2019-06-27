@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="card text-center">
            <div class="card-header">
                Formulario de caracterizacion
            </div>
            <div class="card-body">
                <h5 class="card-title">Empieza tu formulario aqui</h5>
                <p class="card-text">Encontraras varios tipos de secciones en el cual tendras que responder las preguntas que te hagan,.</p>
                <a href="{{ route('poll.register') }}" class="btn btn-primary">Realizar Encuesta</a>
            </div>
        </div>
    </div>

@endsection
