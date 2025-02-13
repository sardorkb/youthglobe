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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Applicant (student)
            $table->unsignedBigInteger('partner_id'); // Approver (partner)
            $table->unsignedBigInteger('program_id'); // The program the student applies to
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status of the application
            $table->text('description')->nullable(); // Comments or notes by the partner
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
