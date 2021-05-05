@extends('admin')

@section('content')

<div class="row">
<div class="col-sm-12">
    <div class="card">
        <form class="form-horizontal">
            <div class="card-body row">
                <h4 class="card-title">Ver Producto </h4>
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
                            <img src="{{ Storage::url($producto->foto_prod)}}" style="max-width:200px" name="{{$producto->nombre_prod}}" class="img-fluid">
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 text-end control-label col-form-label">Nombre Prod</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                            placeholder="{{ $producto->nombre_prod }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-sm-4 text-end control-label col-form-label">Descripción Prod</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"
                            placeholder="{{ $producto->descripcion_prod }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-sm-4 text-end control-label col-form-label">Categorías</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" disabled  placeholder="

                            @foreach ($producto->categorias as $categoria){{$categoria->nombre_cat}} | @endforeach">

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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($producto->tarifas as $tarifa)

                            <tr>


                                    <td>{{ $tarifa->fecha_ini}}</td>
                                    <td>{{ $tarifa->fecha_fin}}</td>
                                    <td>{{ $tarifa->precio}}</td>

                            </tr>

                            @empty

                                <td colspan="3">No hay tarifas creadas.  <a href="{{ route('productotarifa.create')}}" class="btn btn-primary">Crear tarifas</a></li>

                            @endforelse

                        </tbody>

                    </table>
                </div>


            </div>
               <div class="col-sm-6">
    <label
    class="col-sm-12  control-label col-form-label">Galería imágenes</label>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    @if ( !empty ( $producto->id) )


    <div class="form-group">

        <div>


            @if ( !empty ( $producto->id) )

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
                {{-- <a href="{{ route('admin/bicicletas/eliminarimagen', [$img->id, $bicicletas->id]) }}" class="btn btn-danger btn-sm" onclick="return confirmarEliminar();">Eliminar</a> --}}

              @endforeach

            @else

                Aún no se ha cargado una imagen para este producto

            @endif
        </div>

    </div>

  @else



    <div class="form-group">
        <label for="galeria_prod" class="negrita">Selecciona una imagen:</label>
        <div>
            <input name="galeria_prod[]" type="file" id="galeria_prod" multiple="multiple">
        </div>
    </div>

  @endif
</div>




        </form>
        <div class="border-top">
            <div class="card-body">
                <a type="button" href="{{ route('productos.edit', $producto) }}" class="btn btn-info">Editar</a>


                <form class="form-horizontal" id="delete-producto" method="POST" action=" {{ route('productos.destroy', $producto) }}">
                    <a class="btn btn-danger" href="#" onclick='event.preventDefault();document.getElementById("delete-producto").submit()'>Eliminar</a>
                    @csrf   @method('DELETE')

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--deccion dcha-->
@endsection
