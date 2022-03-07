<?php

namespace App\Console\Commands\Settings;

use Illuminate\Console\Command;

class Trans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:trans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reload translation';

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
        $this->callSilently('db:seed',["--class"=>'Database\\Seeders\\Translation\\TranslationSeeder']);
        return 0;
    }
}
