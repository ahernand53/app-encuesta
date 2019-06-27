@extends('layouts.layout')

@section('content')

    <form action="/dashboard/formulario/stages/" method="post">
        @method('post')
        <h2>ETAPA</h2>
        <label>Titulo</label>
        <input required type="text" name="title" >
        <label>Descripcion</label>
        <input required type="text" name="description" >

        <h2>PREGUNTAS</h2>
        <table>
            <tbody>
            @for($i = 0; $i < 2; $i++)
                <tr>
                    <td>
                        <input placeholder="Escribe la pregunta aqui" required name="questions[{{ $i+1 }}]" type="text">
                    </td>
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

                                    <input required name="answers[{{ $i+1 }}][{{ $j+1 }}]" type="text" >

                            @endfor
                        </fieldset>
                        <a href="">Agregar</a>

                    </td>
                </tr>
            @endfor
            </tbody>
        </table>

        <input class="btn btn-primary" type="submit" value="Guardar">
    </form>

@endsection
