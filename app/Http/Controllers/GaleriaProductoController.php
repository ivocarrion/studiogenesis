<?php

namespace App\Http\Controllers;

use App\Models\GaleriaProducto;
use Illuminate\Http\Request;

class GaleriaProductoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GaleriaProducto  $galeriaProducto
     * @return \Illuminate\Http\Response
     */
    public function show(GaleriaProducto $galeriaProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GaleriaProducto  $galeriaProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(GaleriaProducto $galeriaProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GaleriaProducto  $galeriaProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GaleriaProducto $galeriaProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GaleriaProducto  $galeriaProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function eliminarimagen($id)
    {
        $galeria_id = GaleriaProducto::find($id);
        $producto = $galeria_id->producto;

        // Elimino la imagen de la carpeta 'uploads'
        $imagen = GaleriaProducto::select('foto_galeria')->where('id', '=', $id)->get();
        $imgfrm = $imagen->implode('foto_galeria', ', ');
        //dd($imgfrm);
        \Storage::delete($imgfrm);

        GaleriaProducto::destroy($galeria_id->id);

        // Redireccionamos con mensaje
        // Session::flash('message', 'Imagen Eliminada Satisfactoriamente !');
        return redirect()->route('productos.edit', $producto);
        // return Redirect::to('productos.edit', $producto);
    }
}
