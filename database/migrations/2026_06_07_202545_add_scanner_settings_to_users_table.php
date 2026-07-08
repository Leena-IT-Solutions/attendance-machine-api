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
            $table->double('match_threshold')->default(0.80)->after('month_start_date');
            $table->boolean('show_mask_warning')->default(true)->after('match_threshold');
            $table->string('camera_resolution')->default('medium')->after('show_mask_warning');
            $table->boolean('enable_blink_liveness')->default(true)->after('camera_resolution');
            $table->boolean('require_scanner_auth')->default(true)->after('enable_blink_liveness');
            $table->string('kiosk_pin')->nullable()->after('require_scanner_auth');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'match_threshold',
                'show_mask_warning',
                'camera_resolution',
                'enable_blink_liveness',
                'require_scanner_auth',
                'kiosk_pin',
            ]);
        });
    }
};
