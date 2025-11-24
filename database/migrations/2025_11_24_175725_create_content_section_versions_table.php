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
        Schema::create('content_section_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_section_id')->constrained()->onDelete('cascade');
            $table->integer('version_number');
            $table->json('content')->nullable();
            $table->json('styles')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->text('change_description')->nullable();
            $table->timestamps();
            
            $table->index(['content_section_id', 'version_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_section_versions');
    }
};
