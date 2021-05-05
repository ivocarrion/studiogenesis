<?php

namespace App\Http\Controllers;
use App\Http\Producto;
use App\Http\ProductoTarifa;

use Illuminate\Http\Request;

class EliminarTarifaController extends Controller
{
    public function eliminartarifa($id)
    {

            $producto = new Producto;
            $tarifa = ProductoTarifa::find($id);
            if($tarifa){
                $producto = $tarifa->producto;
                ProductoTarifa::destroy($tarifa->id);

                // Redireccionamos con mensaje

                return redirect()->route('productos.edit', $producto);
            }



    }
}
