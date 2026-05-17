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
        Schema::create('counters', function (Blueprint $table) {
           $table->id();
        $table->string('number'); // e.g., "25", "250", "2+"
        $table->string('title_line_1'); // e.g., "Year", "Happy"
        $table->string('title_line_2'); // e.g., "Experience", "Customers"
        $table->boolean('is_active')->default(false); // প্রথম আইটেম হাইলাইট করার জন্য
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
