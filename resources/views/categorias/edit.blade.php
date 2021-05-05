@extends('admin')

@section('content')


<div class="col-sm-6">
<div class="card">
    <form class="form-horizontal" method="post"  enctype="multipart/form-data" action="{{ route('categorias.update', $categoria)}}">
        @csrf  @method('PATCH')
        <div class="card-body">
            <h4 class="card-title">Editar Categoría</h4>
            <div class="form-group row">
                <label for="categoria_id"
                    class="col-sm-3 text-end control-label col-form-label">Categoría Id</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="categoria_id" name="categoria_id"
                        value="{{ $categoria->id }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre_cat" class="col-sm-3 text-end control-label col-form-label">Nombre Cat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombre_cat" name="nombre_cat"
                    value="{{ $categoria->nombre_cat }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="descripcion_cat"
                    class="col-sm-3 text-end control-label col-form-label">Descripción Cat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="descripcion_cat" name="descripcion_cat"
                    value="{{ $categoria->descripcion_cat }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 text-end control-label col-form-label">Padre Cat</label>
                <div class="col-sm-9">
                    <select    name="padre_id" class="select2 form-select shadow-none"
                style="width: 100%; height:36px;">

                        @isset($categoria->padre->id)

                            <option value="{{ $categoria->padre->id }}">
                                {{ $categoria->padre->nombre_cat }}
                            </option>

                        @else

                            <option value="">Sin Categoría padre</option>

                        @endisset
                         @foreach($padres as $padre)

                                <option value="{{ $padre->id }}">{{ $padre->nombre_cat }}</option>

                        @endforeach

                </select>
                </div>
            </div>



        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
