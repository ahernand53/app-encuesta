@extends('layouts.app-db')

@section('content')

    {{--<form action="/dashboard/formulario/stages/{{ $stage->id }}" method="post">
        @method('put')
        <h2>ETAPA</h2>
        <label>Titulo</label>
        <input required type="text" name="title" value="{{ $stage->title }}">
        <label>Descripcion</label>
        <input required type="text" name="description" value="{{ $stage->description }}">

        <h2>PREGUNTAS</h2>
        <table>
            <tbody>
            @foreach($questions as $question)
                <tr>
                    <td><input required name="questions[{{ $question->id }}]" type="text" value="{{ $question->title }}" ><td/>
                    <td>
                        <select name="types[{{ $question->id }}]" id="">
                            @foreach($types as $type)
                                @if($type->name == $question->type->name)
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
                            @if(count($question->answers) > 0)

                                @foreach($question->answers as $answer)

                                    <input required name="answers[{{ $question->id }}][{{ $answer->id }}]" type="text" value="{{ $answer->title }}">

                                @endforeach

                            @else

                                <input required type="text" name="answers[{{$question->id}}][1]">

                            @endif
                        </fieldset>
                                <a href="">Agregar</a>
                                <a href="">Eliminar</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <input class="btn btn-primary" type="submit" value="Guardar">
    </form>--}}

    <div class="container my-5 px-2">
        <div class="row justify-content-center">

            <form action="{{ route('stages.update', $stage->id) }}" method="post">
                @method('put')
                <a class="btn btn-dark rounded rounded-circle ml-5" href="/dashboard/formulario/stages"><i
                            class="fas fa-arrow-left"></i></a>
                <h2 class="font-weight-bold text-center">MODIFICAR ETAPA {{ $stage->id }}</h2>

                <hr class="bg-light w-75">

                <div class="row justify-content-around text-center">
                    <div class="row">
                        <div class="col-6 my-3 my-auto">
                            <label>Titulo</label>
                            <input required type="text" name="title" value="{{ $stage->title }}">
                        </div>
                        <div class="col-6 mb-2">
                            <label>Descripcion</label>
                            <br>


                            <textarea required type="text" name="description" cols="30" rows="2" class="px-2">{{ $stage->description }}</textarea>
                        </div>
                    </div>

                    <div class="row mt-4">


                        <table class="w-100">
                            <tbody>

                            @foreach($questions as $question)
                                <tr>
                                    <td>
                                        <input required name="questions[{{ $question->id }}]" type="text" value="{{ $question->title }}" >
                                    <td/>
                                    <td>
                                        <select name="types[{{ $question->id }}]" id="">
                                            @foreach($types as $type)
                                                @if($type->name == $question->type->name)
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
                                            @if(count($question->answers) > 0)

                                                <div class="input-group">
                                                    @foreach($question->answers as $answer)

                                                        <input required name="answers[{{ $question->id }}][{{ $answer->id }}]" type="text" value="{{ $answer->title }}">

                                                    @endforeach
                                                </div>

                                            @else

                                                <div class="input-group">
                                                    @foreach($question->answers as $answer)

                                                        <input required name="answers[{{ $question->id }}][]" type="text" value="{{ $answer->title }}">

                                                    @endforeach
                                                </div>

                                            @endif
                                        </fieldset>
                                        <a class="btn btn-outline-success" href="">Agregar</a>
                                        <a class="btn btn-outline-danger" href="">Eliminar</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr class="bg-light w-100">

                        <div class="mx-auto">
                            <input class="btn btn-primary" type="submit" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection
