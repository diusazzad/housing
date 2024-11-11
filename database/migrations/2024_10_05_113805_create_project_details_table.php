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
        Schema::create('project_details', function (Blueprint $table) {

            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->text('project_specification')->nullable();
            $table->text('locality_advantage')->nullable();
            $table->text('review')->nullable();
            $table->string('project_brochure')->nullable();
            $table->text('project_payment_plan')->nullable();
            $table->text('project_offer')->nullable();
            $table->string('image_path')->nullable(); // Store the image path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
