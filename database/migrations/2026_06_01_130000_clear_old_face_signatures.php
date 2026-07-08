<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Clear all existing face signatures because we are transitioning to InsightFace (MobileFaceNet).
        // The old signatures were generated with FaceNet 512 and are incompatible with the new model.
        DB::table('employees')->update(['face_signature' => null]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No rollback action needed as the data clearance is irreversible.
    }
};
