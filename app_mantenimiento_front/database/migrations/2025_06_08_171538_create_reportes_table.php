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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')->nullable();
            $table->dateTime('fecha_generacion')->nullable();
            $table->string('contenido')->nullable();
            $table->string('formato')->nullable();
            $table->string('filtros')->nullable();
             $table->foreignId('user_id')
                  ->nullable() // Permite que la columna sea NULL
                  ->constrained('users') // Laravel infiere 'id' en 'users'
                  ->onUpdate('set null') // Si el ID del usuario cambia, se actualiza a NULL
                  ->onDelete('set null'); // Si el usuario se elimina, se actualiza a NULL
            // *** FIN DEL CÓDIGO CORREGIDO ***

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
