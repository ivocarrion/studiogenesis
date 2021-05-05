<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $padres = Categoria::get();

        return view('categorias.create')->with('padres', $padres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->padre_id){

            $categoria = Categoria::create([
                'nombre_cat'    => request('nombre_cat'),
                'descripcion_cat' => request('descripcion_cat'),
                'padre_id'  => request('padre_id')
            ]);
        }
        else{

            $categoria = Categoria::create([
                'nombre_cat'    => request('nombre_cat'),
                'descripcion_cat' => request('descripcion_cat')
            ]);
        }
        return redirect()->route('categorias.show', $categoria);
    }

    /**
     * Muestra detalle categoria
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {

        return view('categorias.show', [
            'categoria' => $categoria
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        $padres = Categoria::whereNull('padre_id')->get();

        return view('categorias.edit', [
            'categoria' => $categoria,
            'padres' => $padres
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        // $request->validate([
        //     'nombre_cat'    => 'required',
        //     'descripcion_cat' => 'required',

        // ]);
        if ($request->padre_id){

            $categoria->update([
                'nombre_cat'    => request('nombre_cat'),
                'descripcion_cat' => request('descripcion_cat'),
                'padre_id'  => request('padre_id')
            ]);
        }
        else{
            return $request;
            $categoria->update([
                'nombre_cat'    => request('nombre_cat'),
                'descripcion_cat' => request('descripcion_cat')
            ]);
        }
        return redirect()->route('categorias.show', $categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
