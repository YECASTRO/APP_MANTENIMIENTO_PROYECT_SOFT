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
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora')->nullable();
            $table->string('tipo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('estado')->nullable();
            $table->dateTime('fecha_resolucion')->nullable();
            $table->text('notas_resolucion')->nullable();
            
             $table->foreignId('equipo_id')
                  ->nullable() 
                  ->constrained('equipos')
                  ->onUpdate('set null')
                  ->onDelete('set null');

             $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->onUpdate('set null')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('alertas');
    }
};
