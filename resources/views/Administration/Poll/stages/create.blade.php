@extends('layouts.app-db')

@section('content')

    <div class="container my-5 px-2">
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
    </div>


    </div>
    </div>

@endsection
