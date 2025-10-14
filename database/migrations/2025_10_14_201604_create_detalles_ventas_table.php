<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_ventas', function (Blueprint $table) {
             $table->id('detalle_venta_id'); // clave primaria

            // Llaves foráneas
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('producto_id');

            // Campos adicionales
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2)->nullable();

            $table->timestamps();

            // Definición de llaves foráneas
            $table->foreign('venta_id')->references('venta_id')->on('ventas')->onDelete('cascade');
            $table->foreign('producto_id')->references('producto_id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_ventas');
    }
};
