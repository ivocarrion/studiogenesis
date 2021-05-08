<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_prod', 'descripcion_prod', 'foto_prod'];

    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'categoria_productos');
    }

    public function tarifas(){
        return $this->hasMany(ProductoTarifa::class);
    }
    public function galeria(){
        return $this->hasMany(GaleriaProducto::class);
    }
    public function event(){
        return $this->hasMany(Event::class);
    }
}
