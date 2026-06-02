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
        Schema::create('field_investigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');
            $table->foreignId('farmer_id')->constrained('farmers')->onDelete('cascade');
            $table->string('land_verified_amount'); // যাচাইকৃত জমির পরিমাণ
            $table->string('crop_or_sector_status'); // ফসলের বর্তমান অবস্থা (ভালো/মাঝারি/ঝুঁকিপূর্ণ)
            $table->text('agent_comments'); // এজেন্টের মন্তব্য
            $table->string('investigation_image'); // মাঠের ছবি সংরক্ষণের জন্য কলাম
            $table->enum('recommendation', ['recommended', 'not_recommended'])->default('recommended'); // চূড়ান্ত সুপারিশ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_investigations');
    }
};
