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
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Foreign Key referencing projects(id)
            $table->text('project_specification')->nullable(); // Nullable
            $table->text('locality_advantage')->nullable(); // Nullable
            $table->text('review')->nullable(); // Nullable
            $table->string('project_brochure')->nullable(); // Nullable
            $table->text('project_payment_plan')->nullable(); // Nullable
            $table->text('project_offer')->nullable(); // Nullable
            $table->timestamps(); // Created at & Updated at 
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
