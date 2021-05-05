@extends('admin')

@section('content')
{{ $categoria }}<br/>
{{ $padres }}

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
                        placeholder="{{ $categoria->id }}" >
                        <span> </span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 text-end control-label col-form-label">Nombre Cat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                        placeholder="{{ $categoria->nombre_cat }}" >
                </div>
            </div>
            <div class="form-group row">
                <label
                    class="col-sm-3 text-end control-label col-form-label">Descripción Cat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                        placeholder="{{ $categoria->descripcion_cat }}" >
                </div>
            </div>
            <div class="form-group row">
                <label
                    class="col-sm-3 text-end control-label col-form-label">Padre Cat</label>
                <div class="col-sm-9">
                    <select class="select2 form-select shadow-none"
                    style="width: 100%; height:36px;">
                    <option value=" {{ $categoria->padre->id }}">{{ $categoria->padre->nombre_cat }}</option>
                        <optgroup label="Padre">

                            @isset($categoria->padre->id)

                            <option value="{{ $categoria->padre->id }}">
                                {{ $categoria->padre->nombre_cat }}
                            </option>

                        @else
                        <option value="null">Sin Categoría padre</option>

                        @endisset
                         @foreach($padres as $padre)

                                <option value="{{ $padre->id }}">
                                    {{ $padre->nombre_cat }}
                                </option>

                        @endforeach

                        </optgroup>
                    </select>


                    {{-- @isset($categoria->padre->nombre_cat)
                      placeholder="{{$categoria->padre->nombre_cat}}"
                    @else
                     placeholder="Es categoría padre"
                    @endisset --}}



                </div>
            </div>



        <div class="border-top">
            <div class="card-body">
                <a type="button" href="{{ route('categorias.edit', $categoria) }}" class="btn btn-primary">Actualizar</a>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
