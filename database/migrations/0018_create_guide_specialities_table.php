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
        Schema::create('guide_specialities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guide_id')->constrained('guides')->onDelete('cascade');
            $table->foreignId('speciality_id')->constrained('specialities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guide_specialities');
    }
};
