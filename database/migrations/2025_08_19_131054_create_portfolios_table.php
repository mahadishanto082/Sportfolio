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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('tech')->nullable(); // Can store JSON or comma-separated
            $table->string('title');
            $table->string('short_title')->nullable();
            $table->string('project_name');
            $table->text('project_short_des')->nullable();
            $table->string('category')->nullable();
            $table->string('case_study_url')->nullable();
            $table->string('image')->nullable();
            $table->json('additional_images')->nullable(); // Optional gallery
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
