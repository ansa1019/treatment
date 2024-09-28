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
        // Uploads Table
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->foreignIdFor(patients::class)->constrained('patients')->onDelete('cascade');  // Foreign key to Patients table
            $table->string('filename', 255);  // Filename as VARCHAR(255)
            $table->string('file_path', 255);  // File path as VARCHAR(255)
            $table->timestamp('upload_date')->default(DB::raw('CURRENT_TIMESTAMP'));  // Upload date with default CURRENT_TIMESTAMP
            $table->tinyInteger('status');  // Status as TINYINT
            $table->timestamps();  // created_at and updated_at with TIMESTAMP type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
