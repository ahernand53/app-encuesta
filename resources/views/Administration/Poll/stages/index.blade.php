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
        <stages-list-component></stages-list-component>
    </div>


@endsection


