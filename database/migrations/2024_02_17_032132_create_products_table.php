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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_proveedor')->nullable();
            $table->unsignedBigInteger('id_categoria');

            $table -> foreign('id_proveedor')
            ->reference('id')-> on('providers') 
            ->onDelete('set null');

            $table -> foreign('id_categoria')
            ->reference('id')-> on('categories')
            ->onDelete('set null');


            $table->string('nombre', 50)->nullable(false);
            $table->string('codigo_barras', 50)->nullable(false);
            $table->string('precio_costo')->nullable();
            $table->string('precio_venta')->nullable();
            $table->string('caducidad')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('folio_factura')->nullable(false);
            $table->string('porcentaje_descuento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
