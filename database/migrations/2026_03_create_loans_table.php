<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('articulo_id');
            $table->string('solicitante_id');
            $table->string('custodio_id');
            $table->string('estado');
            $table->timestamp('fecha_solicitud')->nullable();
            $table->timestamp('fecha_entrega')->nullable();
            $table->timestamp('fecha_limite')->nullable();
            $table->timestamp('fecha_devolucion')->nullable();
            $table->string('estado_devolucion')->nullable();
            $table->timestamps();

            $table->foreign('articulo_id')
                  ->references('id')
                  ->on('articulos')
                  ->onDelete('restrict');

            $table->foreign('solicitante_id')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('restrict');

            $table->foreign('custodio_id')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
