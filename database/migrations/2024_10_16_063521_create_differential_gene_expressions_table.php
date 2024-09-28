<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\patients;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Differential_Gene_Expression Table
        Schema::create('differential_gene_expression', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->foreignIdFor(patients::class)->constrained('patients')->onDelete('cascade');  // Foreign key to Patients table
            $table->foreignId('probe')->constrained('probes')->onDelete('cascade');  // Foreign key to Probes table
            $table->float('log_fold_change');  // Log fold change as FLOAT
            $table->float('p_value');  // P-value as FLOAT
            $table->float('adjusted_p_value');  // Adjusted p-value as FLOAT
            $table->foreignId('upload')->constrained('uploads')->onDelete('cascade');  // Foreign key to Uploads table
            $table->timestamps();  // created_at and updated_at with TIMESTAMP type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('differential_gene_expressions');
    }
};
