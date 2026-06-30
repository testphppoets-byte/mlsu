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
        Schema::create('themes', function (Blueprint $table) {
	    $table->id();
	    $table->text('site_name')->nullable();
	    $table->text('title')->nullable();
	    $table->text('logo')->nullable();
            $table->text('height')->nullable();
            $table->text('width')->nullable();
	    $table->text('head_content')->nullable(); // store as JSON array
	    $table->text('footer_content')->nullable();
	    $table->timestamps();
	});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
