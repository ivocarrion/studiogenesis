@extends('admin')

@section('content')

<div class="col-sm-6">
<div class="card">
    <form class="form-horizontal">
        <div class="card-body">
            <h4 class="card-title">Ver Categoría </h4>
            <div class="form-group row">
                <label
                    class="col-sm-3 text-end control-label col-form-label">Categoría Id</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                        placeholder="{{ $categoria->id }}" disabled>
                        <span> </span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 text-end control-label col-form-label">Nombre Cat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                        placeholder="{{ $categoria->nombre_cat }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label
                    class="col-sm-3 text-end control-label col-form-label">Descripción Cat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                        placeholder="{{ $categoria->descripcion_cat }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label
                    class="col-sm-3 text-end control-label col-form-label">Padre Cat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" disabled

                    @isset($categoria->padre->nombre_cat)
                      placeholder="{{$categoria->padre->nombre_cat}}"
                    @else
                     placeholder="Es categoría padre"
                    @endisset

                    >

                </div>
            </div>




    </form>
    <div class="border-top">
        <div class="card-body">
            <a type="button" href="{{ route('categorias.edit', $categoria) }}" class="btn btn-info">Editar</a>
            <a class="btn btn-danger" href="#" onclick='event.preventDefault();document.getElementById("delete-categoria").submit()'>Eliminar</a>

            <form class="form-horizontal" id="delete-categoria" method="POST" action=" {{ route('categorias.destroy', $categoria) }}">

                @csrf   @method('DELETE')

            </form>
        </div>
    </div>
</div>
</div>
@endsection
