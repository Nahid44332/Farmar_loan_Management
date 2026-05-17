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
        Schema::create('investors', function (Blueprint $table) {
        $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('investment_range');
            $table->string('nid_front')->nullable(); // ফ্রন্ট ইমেজ পাথ
            $table->string('nid_back')->nullable();  // ব্যাক ইমেজ পাথ
            $table->string('password');
            $table->string('status')->default('pending'); // pending, approved, suspended
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
};
