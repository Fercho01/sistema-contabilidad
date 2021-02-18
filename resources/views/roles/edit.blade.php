@extends('admin.master')
@section('container')
    <h2>Editar Rol</h2>
    <form action="{{ route('roles.update',['role' => $role->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="slug">URL:</label>
                    <input type="text" name="slug" class="form-control" id="slug" value="{{ $role->slug }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input name="description" class="form-control" id="description" value="{{ $role->description }}">
                </div>
            </div>


            <div class="col-lg-6">
                <h3>Permiso especial</h3>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" class="" style="cursor: pointer;" id="special" name="special" value="all-access"
                        @isset($role)
                            @if ($role->special=='all-access') {{'checked'}} @endif
                        @endisset>
                        Acceso total
                    </span>
                    <span class="input-group-addon">
                        <input type="radio" class="" style="cursor: pointer;" id="special" name="special" value="no-access"
                        @isset($role)
                        @if ($role->special=='no-access') {{'checked'}}@endif
                        @endisset>
                        Ningún acceso
                    </span>
                </div>
            </div>
        </div>
        <hr>



        <div class="row">
            <div class="col-lg-10">
                <h4>Lista de permisos</h4>
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Permiso</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td>
                                {{ $permission->description }}
                            </td>
                            <td>
                            <input type="checkbox" value="{{ $permission->id }}"
                            name="permissions[]" id="permissions[{{ $permission->id }}]"
                            class="form-check-input" style="cursor: pointer;"
                            @if(isset($assignedPermissions)){{in_array($permission->id,$assignedPermissions) ? 'checked':''}}@endif
                            >
                            </td>
                                {{-- <span class="text-info">{{ $permission->name }}</span>
                                <span class="text-red">({{ $permission->description ? : 'Sin descripción' }})</span> --}}
                        </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group">
            <a href="{{ route('roles.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retornar</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
        </div>

    </form>

@endsection
