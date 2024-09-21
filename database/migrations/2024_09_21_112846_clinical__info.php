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
        // Clinical_Info Table
        Schema::create('clinical_info', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->foreignId('patient')->constrained('patients')->onDelete('cascade');  // Foreign key to Patients table
            $table->float('psa_bs');  // PSA_BS as FLOAT
            $table->float('psa_3m');  // PSA_3M as FLOAT
            $table->float('psa_dr');  // PSA_DR as FLOAT
            $table->string('other_clinical_variable', 255);  // Other clinical variables as VARCHAR(255)
            $table->string('value', 255);  // Value as VARCHAR(255)
            $table->timestamps();  // created_at and updated_at with TIMESTAMP type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
