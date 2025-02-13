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
        Schema::create('partner_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id'); // Foreign key to partners table
            $table->enum('type', ['local', 'global']); // Type of the partner
            $table->string('company_name'); // Company name
            $table->string('address'); // Company address
            $table->string('phone_number'); // Contact phone number
            $table->string('additional_email')->nullable(); // Optional additional email
            $table->year('year_of_establishment'); // Year of establishment
            $table->string('cert_license_file')->nullable(); // Certificate or license file
            $table->decimal('rating', 3, 2)->default(0.00); // Rating out of 5
            $table->string('description')->nullable(); // Optional description
            $table->string('website_link')->nullable(); // Optional website link
            $table->timestamps();

            // Foreign key constraint (to associate the partner details with the partners table)
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_details');
    }
};
