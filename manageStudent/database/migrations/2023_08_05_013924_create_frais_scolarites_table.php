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
        Schema::create('frais_scolarites', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('niveau_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade'); 

            $table->foreignId('school_year_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('montant');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frais_scolarites');
    }
};
