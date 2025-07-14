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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('phone_country_code_id')->constrained('phone_country_codes')->onDelete('cascade');
            $table->string('phone_number', 15)->nullable();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('review')->default(0);
            $table->string('profile_picture')->nullable();
            $table->string('About', 500)->nullable();
            $table->integer('experience_years')->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
