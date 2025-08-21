<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;
use Spatie\Multitenancy\Contracts\IsTenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;


class CreateTenantDatabase implements SwitchTenantTask
{
    public function makeCurrent(IsTenant $tenant): void
    {
//        dd([
//            'default_connection' => DB::getDefaultConnection(),
//            'current_database' => DB::connection()->getDatabaseName(),
//        ]);
        // Use landlord DB connection to create the tenant database
        $dbName = $tenant->database;
        DB::connection(config('multitenancy.tenant_database_connection_name'))
        ->statement("CREATE DATABASE IF NOT EXISTS `$dbName`");
//        DB::statement("CREATE DATABASE IF NOT EXISTS `$dbName`");

    }

    public function forgetCurrent(): void
    {
        // Nothing needed here
    }
}
