<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footercontents', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // FIXED
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address', 500)->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footercontents'); // FIXED
    }
};
