<?php

namespace App\Http\Controllers;

use App\Models\ProductoTarifa;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoTarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifas.create', [
            'productotarifa' => new ProductoTarifa,
            'productos'  => Producto::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifasArray = $request->toArray();

        $numTarifas = count($tarifasArray['producto_id']);

        $posicion = 0;

        for ($tarifa = 1; $tarifa <= $numTarifas; $tarifa++) {

            ProductoTarifa::create([

                    'producto_id'    => $tarifasArray['producto_id'][$posicion],
                    'fecha_ini' => $tarifasArray['fecha_ini'][$posicion],
                    'fecha_fin' => $tarifasArray['fecha_fin'][$posicion],
                    'precio' => $tarifasArray['precio'][$posicion]
            ]);
            $posicion++;
        };

        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductoTarifa  $productoTarifa
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoTarifa $productoTarifa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductoTarifa  $productoTarifa
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductoTarifa $productoTarifa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductoTarifa  $productoTarifa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoTarifa $productoTarifa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductoTarifa  $productoTarifa
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductoTarifa $productoTarifa)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductoTarifa  $productoTarifa
     * @return \Illuminate\Http\Response
     */


}
