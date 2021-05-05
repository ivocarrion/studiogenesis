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

                <td colspan="3">No hay productos</li>

            @endforelse

        </tbody>

    </table>
</div>
