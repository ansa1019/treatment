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
        // Patients Table
        Schema::create('patients', function (Blueprint $table) {
            $table->string('id', length: 8)->primary();  // primary key
            $table->string('name', 50);  // Name as VARCHAR(50)
            $table->date('dob');  // Date of birth
            $table->tinyInteger('gender');  // Gender as TINYINT
            $table->date('diagnosis_date');  // Diagnosis date
            $table->text('additional_info')->nullable();  // Additional info as TEXT
            $table->timestamps();  // created_at and updated_at with TIMESTAMP type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
