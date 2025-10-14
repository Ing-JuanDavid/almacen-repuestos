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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id("venta_id");
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();

            // Campos adicionales
            $table->integer('total');
            $table->string("estado", 10);
            $table->date("fecha")->useCurrent();

            // Definición de llaves foráneas
            $table->foreign('cliente_id')->references('cliente_id')->on('clientes')->onDelete('cascade');
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
