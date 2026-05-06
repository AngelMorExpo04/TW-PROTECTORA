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
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id(); // id de la solicitud
            $table->foreignId('user_id')->nullable()->constrained('users', 'id')->onDelete('cascade'); // id del usuario, relacionado con la tabla users
            $table->foreignId('animal_id')->nullable()->constrained('animals', 'id')->onDelete('cascade'); // id del animal, relacionado con la tabla animals
            $table->text('application_text'); // texto de la solicitud y por qué quiere hacerse
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // estado de la solicitud, pendiente, aprobada o rechazada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_requests');
    }
};
