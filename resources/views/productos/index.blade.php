@extends('admin')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-0">Productos</h4>
        <a class=" justify-content-between btn button btn-primary" href="{{ route('productos.create') }}">Crear Producto</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Producto ID</th>
                <th scope="col">Nombre</th>
                <th scope=="col">Imagen</th>
                <th scope="col">Descripción</th>
                <th scope="col">Categorías</th>
                <th scope="col">Tarifas</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)

            <tr>
                <td scope="row">{{ $producto->id }}</td>
                <td>{{ $producto->nombre_prod }}</td>
                <td> <img src="{{ Storage::url($producto->foto_prod)}}" style="max-width:60px" name="{{$producto->nombre_prod}}" class="img-fluid"></td>
                <td>{{ $producto->descripcion_prod }}</td>
                <td>@foreach ($producto->categorias as $categoria)
                        {{ $categoria->nombre_cat}} |
                        @endforeach
                </td>
                <td>@foreach ($producto->tarifas as $tarifa)
                    {{ $tarifa->fecha_ini}} a {{ $tarifa->fecha_fin}}={{ $tarifa->precio}} <br/>
                    @endforeach
                </td>
                <td> <a class=" justify-content-between" href="{{ route('productos.show', $producto) }}">Ver</a></td>
            </tr>

        @empty

            <td colspan="4">No hay productos</li>

        @endforelse
        </tbody>
    </table>
    {{ $productos->links() }}

</div>
@endsection
