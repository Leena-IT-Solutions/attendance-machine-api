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
        Schema::table('users', function (Blueprint $table) {
            $table->string('subscription_platform')->nullable(); // 'ios' or 'android'
            $table->string('subscription_tier')->default('free'); // free, tier_5, tier_10, etc.
            $table->boolean('subscription_active')->default(false);
            $table->timestamp('subscription_expires_at')->nullable();
            $table->integer('max_employees')->default(2);
            $table->text('purchase_token')->nullable(); // Google purchaseToken or Apple receipt
            $table->string('original_transaction_id')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'subscription_platform',
                'subscription_tier',
                'subscription_active',
                'subscription_expires_at',
                'max_employees',
                'purchase_token',
                'original_transaction_id',
            ]);
        });
    }
};
