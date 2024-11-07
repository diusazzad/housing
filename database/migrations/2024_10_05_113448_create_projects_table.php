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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locality_id')->constrained()->onDelete('cascade');
            $table->foreignId('builder_id')->constrained()->onDelete('cascade');
            $table->string('project_name');
            $table->string('price_range'); // e.g., "₹37.5 L - ₹52.0 L"
            $table->string('bhk_configurations'); // e.g., "1 BHK, 2 BHK"
            $table->string('carpet_area_range'); // e.g., "407 sq.ft - 550 sq.ft"
            $table->string('rera_registration')->nullable();
            $table->date('possession_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
