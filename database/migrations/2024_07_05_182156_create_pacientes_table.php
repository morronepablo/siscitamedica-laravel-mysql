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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('genero', 10);
            $table->string('dni', 8)->unique();
            $table->string('nro_seguro', 8)->unique()->nullable();
            $table->string('celular', 10);
            $table->string('fecha_nacimiento', 10);
            $table->string('grupo_sanguineo', 20)->nullable();
            $table->string('alergias', 20)->nullable();
            $table->string('contacto_emergencia', 255)->nullable();
            $table->string('direccion', 255);
            $table->string('correo', 255)->unique();
            $table->string('observaciones', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
