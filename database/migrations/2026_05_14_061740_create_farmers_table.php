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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->nullable();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('nid')->unique();
            $table->string('land_amount')->nullable();
            $table->string('loan_amount');
            $table->integer('loan_duration')->nullable();
            $table->decimal('monthly_installment', 10, 2)->nullable();
            $table->string('category');
            $table->string('image')->nullable();
            $table->text('address');
            $table->string('password');

            // pending / approved / rejected
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
