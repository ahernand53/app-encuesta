@extends('layouts.app')

@section('content')

   {{-- <div class="row justify-content-center">
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
    </div>--}}

   <div class="container-fluid">

       <div class="row card text-center">

           <div class="card-header">
               <h1> CARACTERIZACIÓN DE GRUPOS ETARIOS </h1>
               <img src="{{asset('images/logoSena.png')}}" alt="" width="140px">
           </div>

           <div class="card-body">
               <div class="card-action">
                   <a href="{{ route('poll.register') }}" class="btn btn-lg w-25 btn-primary">Realizar Encuesta</a>
               </div>
               <div class="card-image">
                   <div class="row justify-content-center">
                       <img src="{{asset('images/censistas.png')}}" alt="" srcset="" width="300px">
                       <img src="{{asset('images/censo.png')}}" alt="" srcset="" width="420px">
                   </div>
                   <div class="row text-center">
                       <div class="col-12">
                           <h2>CENSO DIGITAL, MÁS FÁCIL, ÁGIL Y RÁPIDO</h2>
                       </div>
                   </div>
               </div>
           </div>

       </div>

       <div class="row">
           <div class="col-12">
               <div class="card-group">

                   <div class="card text-center">

                       <div class="card-header">
                           <h3>Manejo de formulario</h3>
                       </div>

                       <div class="card-body">
                           <img class="img-fluid" src="{{ asset('images/etapas.png') }}" alt="">
                       </div>

                   </div>

                   <div class="card text-center">

                       <div class="card-header">
                           <h3>Graficas utiles para estadistica de datos</h3>
                       </div>

                       <div class="card-body">
                           <img class="img-fluid" src="{{asset('images/graficas.png') }}" alt="">
                       </div>

                   </div>

               </div>
           </div>
       </div>



   </div>

@endsection
