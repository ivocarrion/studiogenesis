<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_tarifas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->onDelete('cascade');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->decimal('precio', 10,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_tarifas');
    }
}
