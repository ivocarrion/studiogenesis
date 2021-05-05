<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTarifa extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['producto_id','fecha_ini', 'fecha_fin', 'precio'];

    // Relación Inversa (Opcional)
    public function producto()
    {
    	return $this->belongsTo(Producto::class);
    }
}

