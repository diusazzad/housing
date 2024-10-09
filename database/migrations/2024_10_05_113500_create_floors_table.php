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
        Schema::create('floors', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Foreign Key referencing projects(id)
            $table->string('floor_section')->nullable(); // Nullable
            $table->string('floor_segment_1')->nullable(); // Nullable
            $table->decimal('segment_price_1', 10, 2)->nullable(); // Nullable
            $table->decimal('segment_sqft_1', 10, 2)->nullable(); // Nullable
            $table->decimal('segment_emi_1', 10, 2)->nullable(); // Nullable
            $table->string('segment_floor_image_1')->nullable(); // Nullable
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floors');
    }
};
