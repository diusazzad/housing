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
        Schema::create('markets', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Foreign Key referencing projects(id)
            $table->string('map_view')->nullable(); // Nullable
            $table->text('locality_guide')->nullable(); // Nullable
            $table->text('compare_properties')->nullable(); // Nullable
            $table->text('about_developer')->nullable(); // Nullable
            $table->text('questions_and_answers')->nullable(); // Nullable
            $table->text('projects_by_group')->nullable(); // Nullable
            $table->text('similar_projects')->nullable(); // Nullable
            $table->boolean('recently_added')->default(false);   // Default: false
            $table->boolean('resale_project')->default(false);   // Default: false
            $table->boolean('new_project')->default(false);   // Default: false
            $table->text('news_and_articles')->nullable();
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markets');
    }
};
