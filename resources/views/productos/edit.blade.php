@extends('admin')

@section('content')

<div class="row">
<div class="col-sm-12">
    <div class="card">
        <form class="form-horizontal">
            <div class="card-body row">
                <h4 class="card-title">Editar Producto </h4>
                <div class="col-sm-6">
                    <div class="form-group row">
                    <label
                        class="col-sm-4 text-end control-label col-form-label">Producto Id</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                            placeholder="{{ $producto->id }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 text-end control-label col-form-label">Imagen destacada</label>
                    <div class="col-sm-8">
                        <img src="{{ Storage::url($producto->foto_prod)}}" name="{{$producto->nombre_prod}}" class="img-fluid" style="max-width: 200px">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 text-end control-label col-form-label">Nombre Prod</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                            placeholder="{{ old('producto', $producto->nombre_prod)  }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-sm-4 text-end control-label col-form-label">Descripción Prod</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                            placeholder="{{ old('descripcion_prod', $producto->descripcion_prod) }}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-sm-4 text-end control-label col-form-label">Categorías actuales</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"   placeholder="

                            @foreach ($producto->categorias as $categoria){{$categoria->nombre_cat}} | @endforeach" disbled>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3">Selecciona Categorías</label>
                    <div class="col-md-9">
                        <select class="select2 select2-container select2-container--default select2-container--below select2-container--focus select2-container--open" multiple="multiple"
                            style="width: 100%;" name="categoria[]">
                            <optgroup label="Categorías">

                                @foreach ($categorias  as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre_cat}}</option>
                                @endforeach

                            </optgroup>


                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                    class="col-sm-12  control-label col-form-label">Tarifas</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Fin</th>
                                <th scope="col">Precio</th>
                                <th scope="col"></th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($producto->tarifas as $tarifa)

                            <tr>

                                    <td>{{ $tarifa->fecha_ini}}</td>
                                    <td>{{ $tarifa->fecha_fin}}</td>
                                    <td>{{ $tarifa->precio}}</td>
                                    <td><a href="{{ route('eliminartarifa', $tarifa->id) }}"
                                        class="btn btn-danger btn-sm" onclick="return confirmarEliminar();">Eliminar</a>                                    </td>

                            </tr>

                            @empty

                                <td colspan="3">No hay tarifas creadas.  <a href="{{ route('productotarifa.create')}}" class="btn btn-primary">Crear tarifas</a></li>

                            @endforelse

                        </tbody>

                    </table>
                </div>


            </div>
               <div class="col-sm-6">
    <label    class="col-sm-12  control-label col-form-label">Galería imágenes</label>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->




</div>

        </form>

        <!-- Galeria de imagenes -->+


        <div class="form-group">
            <label for="img" class="negrita">Selecciona una imagen:</label>
            <div>
                <input name="foto_galeria[]" type="file" id="img" multiple="multiple">
                <br>
                <br>

                @if ( !empty ( $producto->galeria) )

                  <span>Imagen(es) Actual(es): </span>

                  <br>

                  <!-- Mensaje: Imagen Eliminada Satisfactoriamente ! -->
                  @if(Session::has('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ Session::get('message') }}
                    </div>
                  @endif

                  <!-- Mostramos todas las imágenes pertenecientesa a este registro -->

                  @foreach($producto->galeria as $img)

                  <img src=" {{Storage::url($img->foto_galeria)}}" width="200" class="img-fluid">

                  <!-- Botón para Eliminar la Imagen individualmente -->
                  <a href="{{ route('galeriaproductos', $img->id ) }}" class="btn btn-danger btn-sm" onclick="return confirmarEliminar();">Eliminar</a>

                 @endforeach
                 <script type="text/javascript">

                    function confirmarEliminar() {
                        var x = confirm("Estas seguro de Eliminar?");
                        if (x)
                            return true;
                        else
                            return false;
                    }

                </script>

               @else

               Aún no se ha cargado una imagen para este producto @endif

            </div>

        </div>

        <!-- *** galeria de imagenes ****-->
        <div class="border-top">
            <div class="card-body">
                {{-- <a type="button" href="{{ route('productos.edit', $producto) }}" class="btn btn-info">Editar</a>
                <a class="btn btn-danger" href="#" onclick='event.preventDefault();document.getElementById("delete-producto").submit()'>Eliminar</a>

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
