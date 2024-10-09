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
        Schema::create('amenities', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Foreign Key referencing projects(id)
            $table->text('amenities')->nullable(); // Nullable
            $table->string('amenities_icon')->nullable(); // Nullable
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenities');
    }
};
