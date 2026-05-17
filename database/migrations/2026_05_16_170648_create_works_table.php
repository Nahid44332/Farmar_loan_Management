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
        Schema::create('works', function (Blueprint $table) {
           $table->id();
            $table->string('title')->default('How We do work');
            $table->string('image')->nullable(); // থাম্বনেইল বা কভার ইমেজ
            $table->string('video_url')->nullable(); // ইউটিউব ভিডিওর এমবেড বা নরমাল লিংক
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
