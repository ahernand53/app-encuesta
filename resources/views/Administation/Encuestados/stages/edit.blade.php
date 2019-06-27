@extends('layouts.layout')

@section('content')

    <form action="/dashboard/formulario/stages/{{ $stage->id }}" method="post">
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
                            @foreach($question->answers as $answer)

                                    @if($question->type->name == App\Type::OPCIONES['U'])
                                        <input required name="answers[{{ $question->id }}][{{ $answer->id }}]" type="text" value="{{ $answer->title }}">

                                    @elseif($question->type->name == App\Type::OPCIONES['C'])
                                        <input required name="answers[{{ $question->id }}][{{ $answer->id }}]" type="text" value="{{ $answer->title }}">

                                    @elseif($question->type->name == App\Type::OPCIONES['M'])
                                        <input required name="answers[{{ $question->id }}][{{ $answer->id }}]" type="text" value="{{ $answer->title }}">

                                    @endif

                            @endforeach
                        </fieldset>
                                <a href="">Agregar</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <input class="btn btn-primary" type="submit" value="Guardar">
    </form>
    
@endsection
