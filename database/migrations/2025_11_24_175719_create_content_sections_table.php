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
        Schema::create('content_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique();
            $table->string('section_name');
            $table->enum('section_type', ['hero', 'features', 'pricing', 'testimonials', 'stats', 'cta', 'custom'])->default('custom');
            $table->json('content')->nullable(); // Stores text fields, media paths
            $table->json('styles')->nullable(); // Stores zoom, tilt, glow, shadow settings
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_sections');
    }
};
