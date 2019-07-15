@extends('layouts.app-db')

@section('content')

    @if($errors->has('query'))
        <div class="alert alert-danger" role="alert">
            No se puede eliminar la etapa porque ya esta publicada
        </div>
    @endif

    <div class="card mt-2" style="height: 100vh">

        <div class="card-header bg-dark text-white">
            <h3 class="text-center">Etapas</h3>
        </div>

        <div class="card-body">

            <div class="card-columns">

                <div class="card bg-dark text-white p-3">
                    <div class="card-content text-center">
                        <a href="/dashboard/formulario/stages/create" class="btn rounded rounded-circle bg-white"><i class="fas fa-plus text-dark"></i></a>
                        <p>Nuevo</p>
                    </div>
                </div>

                @foreach($stages as $stage)
                    <div class="card bg-dark text-white">
                        <div class="card-header p-2">
                            <h5 class="text-center">{{ $stage->title }}</h5>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="/dashboard/formulario/stages/{{$stage->id}}/edit" class="btn btn-secondary">Editar</a>
                            &nbsp;
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $stage->id }}">
                                Eliminar
                            </button>
                        </div>
                    </div>

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
                @endforeach
            </div>

        </div>

    </div>


@endsection


