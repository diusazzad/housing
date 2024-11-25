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
        Schema::create('image_test_models', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Image name
            $table->string('mime_type'); // Mime type (e.g., image/png)
            $table->binary('image_data'); // Store image as BLOB
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_test_models');
    }
};
