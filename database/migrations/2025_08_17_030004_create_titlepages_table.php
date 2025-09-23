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
        Schema::create('titlepages', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // main image
            $table->string('short_title')->nullable();
            $table->text('content')->nullable();
            
            $table->text('description')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('status')->default('active'); // default value
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titlepages');
    }
};
