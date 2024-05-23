<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Create an admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (User::where('email','admin@admin.com') != null){
            User::create([
                'name' => 'Ravi',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => 'php123',
            ]);
            $this->info('User Created Successfully');
        }else{
            $this->warn('User Exist');
        }
    }
}
