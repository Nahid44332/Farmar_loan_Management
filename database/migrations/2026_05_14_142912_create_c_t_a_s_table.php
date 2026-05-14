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
        Schema::create('c_t_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // আপনার প্রজেক্ট কি আমাদের সাথে শুরু করতে চান?
            $table->text('description');   // আজই আমাদের সাথে যোগাযোগ করুন এবং ফ্রি কনসালটেন্সি নিন।
            $table->string('button_text'); // যোগাযোগ করুন
            $table->string('button_link'); // contact.html
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_t_a_s');
    }
};
