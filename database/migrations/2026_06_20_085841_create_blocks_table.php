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
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
	    $table->string('title');              // Human-readable block title
            $table->string('slug')->unique();     // Unique identifier for embedding
            $table->text('content')->nullable();  // Block content (HTML/text)
            $table->boolean('published')->default(true); // Published flag
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocks');
    }
};
