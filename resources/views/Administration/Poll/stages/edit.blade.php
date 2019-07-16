{{--
@extends('layouts.app-db')

@section('content')

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
--}}

@extends('layouts.app-db')

@section('content')

    <form action="{{ route('stages.update', $stage->id) }}" method="post">
        @method('put')

        <div class="card mt-3">
            {{-- START HEADER DE LA ETAPA --}}
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" value="{{ $stage->title }}" name="title">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" value="{{ $stage->description }}" name="description">
                    </div>
                </div>
            </div>
            {{-- END HEADER DE LA ETAPA --}}

            {{-- START PREGUNTAS DE LA ETAPA --}}
            <div class="card-content">

                <div class="card-columns card-columns-create">

                    {{-- START PREGUNTA --}}
                    @foreach($stage->questions as $question)
                        <div class="card p-2" style="background: #ccc;">

                            {{-- START HEADER DE LA PREGUNTA --}}
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-9">
                                        <input type="text" class="form-control" value="{{ $question->title }}" name="questions[{{ $question->id }}]">
                                    </div>
                                    <div class="col-auto">
                                        <select class="custom-select" name="types[{{ $question->id }}]">
                                            <option>Seleccione un tipo</option>
                                            @foreach($types as $type)
                                                @if($question->type->id == $type->id)
                                                    <option selected value="{{ $type->id }}">{{ $type->name }}</option>
                                                @else
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endif
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
                                        @foreach($question->answers as $answer)
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" value="{{ $answer->title }}" name="answers[{{ $question->id }}][{{ $answer->id }}]" aria-describedby="button-delete">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-danger" type="button" id="button-delete">✖</button>
                                                </div>
                                            </div>
                                        @endforeach
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
                    @endforeach
                    {{-- END PREGUNTA --}}

                </div>

            </div>
            {{-- END PREGUNTAS DE LA ETAPA --}}

            {{-- FOOTER DE LA ETAPA --}}
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-success m-0" value="Actualizar">
            </div>

        </div>

    </form>

    <div class="container my-5 px-2">
        <div class="row justify-content-center">


            {{--<form id="preguntas" action="{{ route('stages.update', $stage->id) }}" method="post">
                @method('put')
                <a class="btn btn-dark rounded rounded-circle ml-5" href="{{ route('stages.index') }}"><i
                            class="fas fa-arrow-left"></i></a>
                <h2 class="font-weight-bold text-center">MODIFICAR ETAPA {{ $stage->id }}</h2>

                <hr class="bg-light w-75">

                <div class="row justify-content-around text-center">
                    <div class="row bg-white p-3">
                        <div class="col-4 my-auto">
                            <label>Titulo</label>
                            <input required type="text" name="title" value="{{ $stage->title }}">
                        </div>
                        <div class="col-6 ml-5 mb-2">
                            <label>Descripcion</label>
                            <br>


                            <textarea required type="text" name="description" cols="30" rows="2" class="px-2">{{ $stage->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-12 w-100 mt-4">


                        <table class="col">
                            <tbody class="row justify-content-around">

                            @foreach($questions as $question)

                                <tr class="mb-5 bg-white p-3">

                                    <td>

                                        <div class="col-12">
                                            <h2>Pregunta</h2>
                                            <select name="types[{{ $question->id }}]" id="types">
                                                @foreach($types as $type)
                                                    @if($type->name == \App\Type::OPCIONES['M'])
                                                        <option selected value="{{ $type->id }}">{{ @strtoupper($type->name) }}</option>
                                                    @else
                                                        <option value="{{ $type->id }}">{{ @strtoupper($type->name) }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <br>
                                            <textarea required name="questions[{{ $question->id }}]" id="description" cols="30" rows="2">{{ $question->title }}</textarea>
                                        </div>



                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <fieldset class="col-12">
                                            <legend>Respuestas</legend>
                                            @foreach($question->answers as $answer)
                                                <label class="font-weight-bold">{{ $loop->iteration }}</label>
                                                <input required name="answers[{{ $question->id }}][{{ $answer->id }}]"
                                                       type="text" value="{{ $answer->title }}">
                                                <br>
                                            @endforeach
                                            <a class="btn btn-sm btn-outline-info">Añadir respuesta</a>
                                        </fieldset>


                                    </td>

                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <hr class="bg-light w-100">

                        <div class="mx-auto">
                            <a class="btn btn-info" id="addQuestion">Agregar pregunta</a>
                            <input class="btn btn-success" type="submit" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>--}}
            <script type="text/javascript" >
                $(document).ready(function(){


                        $("tr").prepend('<td><a class="delete btn btn-outline-danger rounded rounded-circle" href="#"><i class="fas fa-times"></i></a></td>');
                        /*                     $("tr:last-child").append('<td><a class="btn btn-success rounded rounded-circle text-dark" ><i class="fas fa-plus"></i></a></td>'); */
                        /*                     $("#addBtn").click(function() {
                                                $("tbody:last-child").append("<tr><td>1</td><td>2</td><td>3</td><td></td></tr>");
                                            }); */
                        $(window).resize(function(){

                            if ($(window).width() <= 620) {

                                $("tr").addClass("card");
                                console.log
                            }
                            if ($(window).width() > 620) {

                                $("tr").removeClass("card");
                                console.log
                            }

                        });



                        $('.delete').click(function(){
                            console.log($(this).parents("tr").eq(0).html());
                            id = $(this).parents("tr").remove();
                            return false;
                        });

                        var types = [];
                        @foreach($types as $type)
                            types.push("{{ $type->name }}");
                        @endforeach

                        $('#addQuestion').click(function() {
                            $("tbody").append(
                                '<tr class="mb-5 bg-white border p-3">' +
                                    '<td>' +
                                        '<a class="delete btn btn-outline-danger rounded rounded-circle" href="#">' +
                                            '<i class="fas fa-times" aria-hidden="true"></i>' +
                                        '</a>' +
                                    '</td>' +
                                    '<td>' +
                                        '<div class="col-12">' +
                                            '<h2>Pregunta</h2>' +
                                            '<select name="types[1]" id="">' +
                                            types.forEach((item) => {
                                                return '<option>item</option>'
                                            }) +
                                            '</select>' +
                                            '<br>' +
                                            '<textarea required="" name="questions[]" id="description" cols="30" rows="2"></textarea>' +
                                        '</div>' +
                                    '</td>' +
                                    '<td>' +
                                        '<fieldset class="col-12">' +
                                            '<legend>Respuestas</legend>' +
                                            '<label class="font-weight-bold">1</label>' +
                                            '<input required="" name="answers[1][1]" type="text">' +
                                            '<br>' +
                                            '<label class="font-weight-bold">2</label>' +
                                            '<input required="" name="answers[1][2]"="text">' +
                                            '<br>' +
                                            '<label class="font-weight-bold">3</label>' +
                                            '<input required="" name="answers[1][3]" type="text">' +
                                            '<br>' +
                                            '<a class="btn btn-sm btn-outline-info">Añadir respuesta</a>' +
                                '       </fieldset>' +
                            '       </td>' +
                                '</tr>'
                            );
                        });


                    }


                );


            </script>
        </div>







    </div>


    </div>
    </div>

@endsection

