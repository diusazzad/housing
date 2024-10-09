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
        Schema::create('localities', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('city_id')->constrained()->onDelete('cascade'); // Foreign Key referencing cities(id)
            $table->string('name'); // Not Null
            $table->text('description')->nullable(); // Nullable
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localities');
    }
};
