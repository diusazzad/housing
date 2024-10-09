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
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('locality_id')->constrained()->onDelete('cascade'); // Foreign Key referencing localities(id)
            $table->foreignId('builder_id')->constrained()->onDelete('cascade'); // Foreign Key referencing builders(id)
            $table->string('project_name'); // Not Null
            $table->string('developer'); // Not Null
            $table->string('address'); // Not Null
            $table->decimal('pricing', 10, 2); // Not Null
            $table->decimal('avg_price', 10, 2)->nullable(); // Nullable
            $table->decimal('emi_starts', 10, 2)->nullable(); // Nullable
            $table->string('rera_status'); // Not Null
            $table->string('contact_seller')->nullable(); // Nullable
            $table->text('configuration')->nullable(); // Nullable
            $table->date('possession_starts')->nullable(); // Nullable
            $table->decimal('carpet_area', 10, 2)->nullable(); // Nullable
            $table->text('why_to_choose')->nullable(); // Nullable
            $table->text('around_this_project')->nullable(); // Nullable
            $table->string('segments')->nullable(); // Nullable
            $table->text('overview')->nullable(); // Nullable
            $table->decimal('size', 10, 2)->nullable(); // Nullable
            $table->decimal('project_size', 10, 2)->nullable(); // Nullable
            $table->date('launched_date')->nullable(); // Nullable
            $table->string('rera_id')->nullable(); // Nullable
            $table->text('more_about_project')->nullable(); // Nullable
            $table->string('image_path')->nullable(); 
            $table->timestamps(); // Created at & Updated at
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
