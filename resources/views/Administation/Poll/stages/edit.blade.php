@extends('layouts.app-db')

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
    </form>
    
@endsection
