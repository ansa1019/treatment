<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Logs Table
        Schema::create('logs', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->foreignId('user')->constrained('users')->onDelete('cascade');  // Foreign key to Users table
            $table->string('action', 255);  // Action as VARCHAR(255)
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));  // Created at with default CURRENT_TIMESTAMP
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
