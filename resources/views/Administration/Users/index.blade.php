@extends('layouts.app-db')

@section('content')

    @if(isset($message))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <table class="table table-light">
        <button data-toggle="modal" data-target="#createModal" class="btn btn-outline-primary form-control">➕</button>
        <thead class="table-dark text-center" >
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
            <th scope="col">Verificado</th>
            <th scope="col">Control</th>
        </thead>

        <tbody>
            @foreach($admins as $admin)
                @if($admin->id == auth()->user()->id)
                    @continue
                @endif
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        @if($admin->isSuper)
                            <span class="badge badge-primary">{{ $admin->type() }}</span>
                        @else
                            <span class="badge badge-secondary">{{ $admin->type() }}</span>
                        @endif
                    </td>
                    <td>
                        @if($admin->isVerified())
                            <span class="badge badge-success">Verificado</span>
                        @else
                            <span class="badge badge-danger">No Verificado</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $admin->id }}">
                            editar
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $admin->id }}">
                            Eliminar
                        </button>
                        {{-- START MODAL EDIT --}}
                        <div class="modal fade" id="editModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('usuarios.update', [$admin->id]) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Admininstrador</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nombre</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Apellido</label>
                                                    <input type="text" class="form-control" name="lastname" value="{{ $admin->lastname }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Email</label>
                                                    <input disabled type="email" class="form-control" name="email" value="{{ $admin->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Telefono</label>
                                                    <input type="text" class="form-control" name="lastname" value="{{ $admin->phone }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Administrador</label>
                                                    <select name="isSuper">
                                                        <option @if($admin->isSuper) selected @endif value="1">SI</option>
                                                        <option @if(!$admin->isSuper) selected @endif value="0">NO</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Guardar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- END MODAL EDIT --}}
                        {{-- START MODAL DELETE --}}
                        <div class="modal fade" id="deleteModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="{{ route('usuarios.destroy', [$admin->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Administrador</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Desea eliminar el administrador?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-primary" value="Eliminar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- END MODAL DELETE --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('usuarios.store') }}" method="post">
                @csrf
                @method('post')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Administrador</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="col-form-label">Nombre</label>
                                <input required type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label  class="col-form-label">Apellido</label>
                                <input required type="text" class="form-control" name="lastname">
                            </div>
                            <div class="form-group">
                                <label  class="col-form-label">Email</label>
                                <input required type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label  class="col-form-label">Telefono</label>
                                <input required type="text" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label  class="col-form-label">Tipo de documento</label>
                                <select name="document_type" id="">
                                    <option value="cedula">CC</option>
                                    <option value="ti">TI</option>
                                    <option value="pasaporte">pasaporte</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label  class="col-form-label">Numero de Documento</label>
                                <input required type="tel" class="form-control" name="document_number">
                            </div>
                            <div class="form-group">
                                <label  class="col-form-label">Administrador</label>
                                <select required name="isSuper">
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
