<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Convert all existing 'super_admin' users to 'admin'
        User::where('role', 'super_admin')->update(['role' => 'admin']);

        // 2. Convert all existing 'admin' users to 'user' EXCEPT Sandeep and Leena
        $adminEmails = [
            'leenaadam28@gmail.com', 
            'sandeep198558@yahoo.com', 
        ];

        User::where('role', 'admin')
            ->whereNotIn('email', $adminEmails)
            ->update(['role' => 'user']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reverse required for data migration
    }
};
