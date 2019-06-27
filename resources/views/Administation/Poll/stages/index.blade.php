@extends('layouts.app-db')

@section('content')
    <a class="btn btn-primary" href="/dashboard/formulario/stages/create">Nuevo</a>

    <table class="table">
        <thead>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
        </thead>

        <tbody>
            @foreach($stages as $stage)
                <tr >
                    <td>{{ $stage->title }}</td>
                    <td>{{ $stage->description }}</td>
                    <td>
                        <a class="btn btn-warning" href="/dashboard/formulario/stages/{{$stage->id}}/edit">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $stage->id }}">
                            Eliminar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $stage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="{{ route('stages.destroy', [$stage->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Etapa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Desea eliminar la estapa?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-primary" value="Eliminar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection


