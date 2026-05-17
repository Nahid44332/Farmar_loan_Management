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
        Schema::create('agents', function (Blueprint $table) {
           $table->id();
        $table->string('name');
        $table->string('phone')->unique(); // লগইন করার সময় ফোন নাম্বার ইউনিক হওয়া জরুরি
        $table->string('district');
        $table->integer('experience')->nullable();
        $table->string('nid_proof')->nullable(); // ইমেজের পাথ সেভ হবে
        $table->string('password');
        $table->string('status')->default('pending'); // ডিফল্ট স্ট্যাটাস পেন্ডিং থাকবে
        $table->rememberToken();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
