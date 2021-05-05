<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaProducto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['producto_id'];

    // Relación Inversa (Opcional)
    public function producto()
    {
    	return $this->belongsTo(Producto::class);
    }
}
