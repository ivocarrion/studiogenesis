@extends('admin')

@section('content')

<div class="row">
<div class="col-sm-12">
    <div class="card">
        <form class="form-horizontal" method="POST" action="{{ route('productos.store') }}" role="form" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <h4 class="card-title">Alta Producto </h4>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-4 text-end control-label col-form-label">Nombre Prod</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nombre_prod"
                                placeholder=" "  >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 text-end control-label col-form-label">Imagen Principal (min 200px * 200px)</label><br/>
                        <div class="col-sm-8">
                        <input  class="form-control bg-light shadow-sm  border-0" type="file" name="foto_prod" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-sm-4 text-end control-label col-form-label">Descripción Prod</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="descripcion_prod"
                                placeholder=" "  >
                        </div>
                    </div>

                @include('productos._form-categorias')





            </div>
                @include('productos._form-galeria')



        </form>
        <div class="border-top">
            <div class="card-body">
               <button type="submit" class="btn btn-info">Guardar</button>
                {{-- <a class="btn btn-danger" href="#" onclick='event.preventDefault();document.getElementById("delete-producto").submit()'>Eliminar</a>

                <form class="form-horizontal" id="delete-producto" method="POST" action=" {{ route('productos.destroy', $producto) }}">

                    @csrf   @method('DELETE')
                </form> --}}
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--deccion dcha-->
@endsection
