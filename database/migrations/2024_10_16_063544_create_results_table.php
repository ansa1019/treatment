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
        // Results Table
        Schema::create('results', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->foreignIdFor(patients::class)->constrained('patients')->onDelete('cascade');  // Foreign key to Patients table
            $table->tinyInteger('type');  // Type as TINYINT
            $table->text('data');  // Result data as TEXT
            $table->text('description')->nullable();  // Description as TEXT
            $table->timestamp('generated_at')->default(DB::raw('CURRENT_TIMESTAMP'));  // Generated at with default CURRENT_TIMESTAMP
            $table->timestamps();  // created_at and updated_at with TIMESTAMP type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
