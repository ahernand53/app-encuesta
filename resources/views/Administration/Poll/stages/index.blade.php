@extends('layouts.app-db')

@section('content')

    @if($errors->has('query'))
        <div class="alert alert-danger" role="alert">
            No se puede eliminar la etapa porque ya esta publicada
        </div>
    @endif
    <div class="container border my-5" style="width:94%;">
        <div class="row justify-content-end my-3">
            <div class="col ml-5">
                <h2 class="font-weight-bold">Etapas</h2>
            </div>
            <div class="col-3 mr-4">
                <a href="/dashboard/formulario/stages/create" class="btn btn-success rounded rounded-circle"><i class="fas fa-plus text-dark"></i></a>
            </div>
        </div>
        <table class="table text-center">
            <thead>
            <th>#</th>
            <th >Titulo</th>
            <th >Descripcion</th>
            <th>acciones</th>
            </thead>

            <tbody>

            @foreach($stages as $stage)
                <tr >
                    <td>{{ $stage->id }}</td>
                    <td>{{ $stage->title }}</td>
                    <td>{{ $stage->description }}</td>
                    <td>
                        <a href="/dashboard/formulario/stages/{{$stage->id}}/edit" class="btn btn-secondary">Editar</a>
                        &nbsp;
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
    </div>


@endsection


