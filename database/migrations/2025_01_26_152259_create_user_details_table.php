<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // Link to the users table
            $table->string('phone_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('passport_copy')->nullable();
            $table->string('place_of_study')->nullable();
            $table->string('confirmation_letter')->nullable(); // File
            $table->string('academic_transcript')->nullable(); // File
            $table->string('motivation_letter')->nullable(); // File
            $table->string('resume')->nullable(); // File
            $table->string('cover_letter')->nullable(); // Optional File
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
