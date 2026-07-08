<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('make:admin {email}')]
#[Description('Promote a user to administrator role')]
class PromoteAdmin extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = \App\Models\User::where('email', $email)->first();

        if (!$user) {
            $this->error('User not found.');
            return;
        }

        $user->role = 'admin';
        $user->save();

        $this->info("User {$email} has been promoted to Admin.");
    }
}
