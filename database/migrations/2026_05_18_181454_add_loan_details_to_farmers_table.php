<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('farmers', function (Blueprint $blueprint) {
            // লোন ডিউরেশন (মাস) এবং মাসিক কিস্তির কলাম (loan_amount এর পরে বসবে)
            $blueprint->integer('loan_duration')->nullable()->after('loan_amount');
            $blueprint->decimal('monthly_installment', 10, 2)->nullable()->after('loan_duration');
        });
    }

    public function down(): void
    {
        Schema::table('farmers', function (Blueprint $blueprint) {
            $blueprint->dropColumn(['loan_duration', 'monthly_installment']);
        });
    }
};
