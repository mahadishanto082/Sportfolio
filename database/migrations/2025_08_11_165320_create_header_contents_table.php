<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderContentsTable extends Migration
{
    public function up()
    {
        Schema::create('header_contents', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->json('buttons')->nullable(); // Stores button names & links as JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('header_contents');
    }
}
