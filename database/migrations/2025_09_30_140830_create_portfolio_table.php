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

            // Title and Sub Title
            $table->string('title');
            $table->string('sub_title')->nullable();

            // Logo
            $table->string('logo_image')->nullable();

            // Caption
            $table->string('caption')->nullable();

            // Project Name
            $table->string('project_name')->nullable();

            // Description
            $table->text('description')->nullable();

            // Status
            $table->enum('status', ['Active', 'Inactive'])->default('Active');

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
