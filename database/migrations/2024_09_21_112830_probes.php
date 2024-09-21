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
        // Probes Table
        Schema::create('probes', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->string('name', 255)->unique();  // Probe name as VARCHAR(255), UNIQUE
            $table->string('gene_symbol', 50);  // Gene symbol as VARCHAR(50)
            $table->string('chromosome', 5);  // Chromosome as VARCHAR(5)
            $table->string('location', 50);  // Location as VARCHAR(50)
            $table->text('annotation')->nullable();  // Annotation as TEXT
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
