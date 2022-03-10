<?php

namespace App\Console\Commands\Settings;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class Permissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reload permissions';

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
        $this->loadPermission();
        return 0;
    }

    private function loadPermission()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsGroups = [
            "users" =>  ["list","create","edit","delete"],
            "partners" =>  ["list","create","edit","delete"],
            "clients" =>  ["list","create","edit","delete"],
            "providers" =>  ["list","create","edit","delete"],
            "vehicles" =>  ["list","create","edit","delete"],
            "roles" =>  ["list","create","edit","delete"],
            "clientInvoices" => ["list","create","edit","delete"],
            "providerInvoices" => ["list","create","edit","delete"],
            "products" => ["list","create","edit","delete"],
            "cameras" => ["list","create","edit","delete"],
        ];

        foreach ($permissionsGroups as $permissionsGroupName=>$permissions){
            foreach($permissions as $permission){
                Permission::firstOrCreate(['name' => "$permissionsGroupName.$permission"]);
            }
        }
    }
}
