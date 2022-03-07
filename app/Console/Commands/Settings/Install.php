<?php

namespace App\Console\Commands\Settings;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install this website';

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
    public function handle(): int
    {
        $this->callSilently('migrate:fresh');
        $this->call('settings:superadmin');
        $this->callSilently('db:seed');
        return 0;
    }
}
