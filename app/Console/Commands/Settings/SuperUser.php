<?php

namespace App\Console\Commands\Settings;

use App\Models\User;
use Illuminate\Console\Command;

class SuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:superadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'configure the super user of this website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Name of the super administrator');
        $email = $this->ask('Email of the super administrator');
        $password = $this->secret('Password of the super administrator');

        User::updateOrCreate(["id"=>1],[
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        return 0;
    }
}