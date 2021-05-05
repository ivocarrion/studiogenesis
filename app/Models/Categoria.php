<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_cat', 'descripcion_cat', 'padre_id'];

    public function padre(){
        return $this->belongsTo(Categoria::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class);
    }
}
