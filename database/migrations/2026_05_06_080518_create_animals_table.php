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
        Schema::create('animals', function (Blueprint $table) {
            $table->id(); // id del animal
            $table->string('name'); // nombre del animal
            $table->string('species'); // especie del animal
            $table->string('breed')->nullable(); // raza del animal (puede ser null al no saberse o ser mestizo)
            $table->date('birth_date'); // fecha de nacimiento
            $table->enum('sex', ['male', 'female']); // sexo del animal
            $table->text('health_status'); // estado de salud del animal, vacunas etc.
            $table->text('description'); // descripcion general corta del animal
            $table->string('image_path'); // Ruta de la imagen del animal
            $table->enum('status', ['available', 'adopted', 'in_process'])->default('available'); // estado del animal disponible, adoptado o en proceso de adopcion
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
