<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('main_about_page', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->text('semi_description')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->text('history')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->json('achievements')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');;
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('main_about_page');
    }
};
