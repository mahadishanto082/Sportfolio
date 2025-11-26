<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('testimonials_main', function (Blueprint $table) {
            $table->id();

            // Foreign key to users table
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->string('name')->nullable();       // manual name if not user
            $table->string('role')->nullable();       // client role
            $table->text('message');                  // testimonial text

            $table->integer('user_rating')->nullable();   // rating given by user (1–5)
            $table->integer('admin_rating')->nullable();  // rating edited by admin

            $table->boolean('status')->default(1);    // 1 = active, 0 = inactive
            $table->string('photo')->nullable();      // photo path

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials_main');
    }
};
