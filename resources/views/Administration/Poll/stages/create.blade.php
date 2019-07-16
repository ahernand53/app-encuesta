@extends('layouts.app-db')

@section('content')


    <a class="btn btn-dark rounded rounded-circle ml-5" href="/dashboard/formulario/stages">⬅</a>
    <div class="container-fluid text-center">
        <h2>Crear Etapa</h2>
    </div>

    <form action="{{ route('stages.store') }}" method="post">
        @method('post')

        <div class="card mt-3">
        {{-- START HEADER DE LA ETAPA --}}
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" value="Etapa sin titulo" name="title">
                </div>
                <div class="col">
                    <input type="text" class="form-control" value="Etapa sin descripcion" name="description">
                </div>
            </div>
        </div>
        {{-- END HEADER DE LA ETAPA --}}

        {{-- START PREGUNTAS DE LA ETAPA --}}
        <div class="card-content">

            <div class="card-columns card-columns-create">

                {{-- START PREGUNTA --}}
                <div class="card p-2" style="background: #ccc;">

                    {{-- START HEADER DE LA PREGUNTA --}}
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" value="Pregunta sin titulo" name="questions[1][]">
                            </div>
                            <div class="col-auto">
                                <select class="custom-select" name="types[1]">
                                    <option selected>Seleccione un tipo</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- END HEADER DE LA PREGUNTA --}}

                    {{-- START RESPUESTAS DE LA PREGUNTA --}}
                    <div class="card-content m-2">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="Respuesta vacia" name="questions[1][]" aria-describedby="button-delete">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger" type="button" id="button-delete">✖</button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="Respuesta vacia" name="questions[1][]" aria-describedby="button-delete">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger" type="button" id="button-delete">✖</button>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="Respuesta vacia" name="questions[1][]" aria-describedby="button-delete">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger" type="button" id="button-delete">✖</button>
                                    </div>
                                </div>
                                <button class="btn btn-outline-dark form-control">Nueva respuesta</button>
                            </div>
                        </div>
                    </div>
                    {{-- END RESPUESTAS DE LA PREGUNTA --}}

                    {{-- START FOOTER DE LA PREGUNTA --}}
                    <div class="card-footer text-right">
                        <button class="btn btn-danger m-0">Eliminar</button>
                    </div>
                    {{-- END FOOTER DE LA PREGUNTA --}}
                </div>
                {{-- END PREGUNTA --}}

            </div>

        </div>
        {{-- END PREGUNTAS DE LA ETAPA --}}

        {{-- FOOTER DE LA ETAPA --}}
        <div class="card-footer text-center">
            <input type="submit" class="btn btn-primary m-0" value="Crear">
        </div>

    </div>

    </form>

    {{--<div class="container my-5 px-2">
        <div class="row justify-content-center">

            <form action="{{ route('stages.store') }}" method="post">
                @method('post')
                <a class="btn btn-dark rounded rounded-circle ml-5" href="/dashboard/formulario/stages"><i
                            class="fas fa-arrow-left"></i></a>
                <h2 class="font-weight-bold text-center">ETAPA</h2>

                <hr class="bg-light w-75">

                <div class="row justify-content-around text-center">
                    <div class="row">
                        <div class="col-6 my-3 my-auto">
                            <label>Titulo</label>
                            <input required type="text" name="title">
                        </div>
                        <div class="col-6 mb-2">
                            <label>Descripcion</label>
                            <br>
                            <textarea name="description" id="description" cols="30" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="row mt-4">


                        <table class="w-100">
                            <tbody>

                            @for($i = 0; $i < 1; $i++) <tr>

                                <td>
                                    <h2>PREGUNTAS</h2>
                                    <textarea required name="questions[{{ $i+1 }}][]" id="description" cols="30" rows="1"></textarea>
                                <td />

                                <td>
                                    <select name="types[{{ $i+1 }}]" id="">
                                        @foreach($types as $type)
                                            @if($type->name == \App\Type::OPCIONES['M'])
                                                <option selected value="{{ $type->id }}">{{ @strtoupper($type->name) }}</option>
                                            @else
                                                <option value="{{ $type->id }}">{{ @strtoupper($type->name) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <fieldset>
                                        <legend>Respuestas</legend>
                                        @for($j=0; $j < 3; $j++)
                                            <label class="font-weight-bold">{{ $j+1 }}</label>
                                            <input required name="questions[{{ $i+1 }}][]"
                                                   type="text">
                                            <br>
                                        @endfor
                                    </fieldset>


                                </td>
                            </tr>
                            @endfor
                            </tbody>
                        </table>
                        <hr class="bg-light w-100">

                        <div class="mx-auto">
                            <input type="submit" class="btn btn-success" value="Crear">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>--}}


    </div>
    </div>

@endsection
