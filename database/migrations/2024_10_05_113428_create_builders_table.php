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
        Schema::create('builders', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Not Null
            $table->string('contact_info')->nullable(); // Nullable
            $table->integer('established_year')->nullable();
            $table->text('description')->nullable();
            $table->string('website')->nullable(); // Nullable
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builders');
    }
};
 
