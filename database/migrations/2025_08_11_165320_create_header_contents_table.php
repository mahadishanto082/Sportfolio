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
        Schema::create('header_contents', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // logo file path
            $table->string('emergency_contact')->nullable(); // stores button_name as emergency_contact
            $table->json('nav_links')->nullable(); // optional: future use for menus
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_contents');
    }
};
