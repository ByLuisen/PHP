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
        Schema::create('lineas_de_historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')
                ->constrained()
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('fecha');
            $table->string('motivo_visita', 300);
            $table->string('descripcion', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas_de_historial');
    }
};
