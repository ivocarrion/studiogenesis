<div class="col-sm-6">
    <label
    class="col-sm-12  control-label col-form-label">Galería imágenes</label>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    @if ( !empty ( $producto->id) )


    <div class="form-group">
        <label for="galeria_prod" class="negrita">Selecciona imágenes:</label>
        <div>
            <input name="galeria_prod[]" type="file" id="galeria_prod" multiple="multiple">
            <br>
            <br>

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



{{-- @if ( !empty ( $producto->id) )

<span>Imagen(es) Actual(es): </span>
<br>

<!-- Mensaje: Imagen Eliminada Satisfactoriamente ! -->
@if(Session::has('message'))
<div class="alert alert-primary" role="alert">
    {{ Session::get('message') }}
</div>
@endif

<!-- Mostramos todas las imágenes pertenecientesa a este registro -->
{{-- @foreach($imagenes as $img) --}}

  {{-- <img src=" {{Storage::url($producto->foto_prod)}}" width="200" class="img-fluid"> --}}

  <!-- Botón para Eliminar la Imagen individualmente -->
  {{-- <a href="{{ route('admin/bicicletas/eliminarimagen', [$img->id, $bicicletas->id]) }}" class="btn btn-danger btn-sm" onclick="return confirmarEliminar();">Eliminar</a> --}}

{{-- @endforeach --}}

{{-- @else

  Aún no se ha cargado una imagen para este producto

@endif --}}
