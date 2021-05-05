<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\GaleriaProducto;
use App\Models\Categoria;
use App\Models\ProductoTarifa;
use Illuminate\Http\Request;
use DB;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $productos = Producto::all();
        // return view('productos.index', compact('productos'));

        return view('productos.index', [
            'productos' => Producto::orderBy('nombre_prod', 'asc')->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
            $productos = Producto::all();
            $categorias = Categoria::get();
            return view('productos.create', [
            'productos' => $productos,
            'categorias' => $categorias
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

        $producto = Producto::create([
            'nombre_prod'    => request('nombre_prod'),
            'descripcion_prod' => request('descripcion_prod'),
            'foto_prod'  => request('foto_prod')
        ]);

        if($request->hasFile('foto_prod')){

            $producto->foto_prod = $request->file('foto_prod')->store('public');

        }

        $producto->save();

        $categorias = $request->input('categoria');

        foreach ($categorias as $categoria)
        {
            //Insert de la/s categoria/s
        $categoria_producto = CategoriaProducto::create([
            'producto_id' => $producto->id,
            'categoria_id'  => $categoria
            ]);
        };

        //Insert de lla galeria
        $ci = $request->file('galeria_prod');

        // Validamos que el nombre y el formato de imagen esten presentes, tu puedes validar mas campos si deseas
        // $this->validate($request, [

        //     'nombre' => 'required',
        //     'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        // ]);

        // Recibimos una o varias imágenes y las guardamos en la carpeta 'uploads'
        if($request->hasFile('galeria_prod')){
            foreach($request->file('galeria_prod') as $image)
                {


                    $foto_galeria = new GaleriaProducto;

                    $foto_galeria->foto_galeria = $image->store('public');


                    $foto_galeria = $foto_galeria->foto_galeria;
                    DB::table('galeria_productos')->insert(
                        [
                            'producto_id' => $producto->id,
                            'foto_galeria' => $foto_galeria
                        ]
                    );


                }
        }
        // Validamos que el nombre y el formato de imagen esten presentes, tu puedes validar mas campos si deseas


        // Redireccionamos con mensaje
        return redirect()->route('productos.show', $producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', [
            'producto' => $producto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {

        $categorias = Categoria::get();

        return view('productos.edit', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
