@extends('admin')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Categorías</h4>
        <a class=" justify-content-between btn button btn-primary" href="{{ route('categorias.create') }}">Crear Categoría</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Categoria ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Categoría Padre</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)

            <tr>
                <td scope="row">{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre_cat }}</td>
                <td>{{ $categoria->descripcion_cat }}</td>
                @isset($categoria->padre->nombre_cat)
                <td> {{$categoria->padre->nombre_cat}} </td>
                @else
                <td>   </td>
                @endisset
                <td> <a class=" justify-content-between" href="{{ route('categorias.show', $categoria) }}">Ver</a> | <a class="  justify-content-between" href="{{ route('categorias.edit', $categoria) }}">Editar</a></td>
            </tr>

        @empty

            <td colspan="4">No hay productos</li>

        @endforelse
        </tbody>
    </table>
</div>
@endsection
