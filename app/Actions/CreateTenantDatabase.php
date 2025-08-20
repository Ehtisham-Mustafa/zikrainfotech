<?php

namespace App\Actions;

use Spatie\Multitenancy\Contracts\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;
use Illuminate\Support\Facades\DB;

class CreateTenantDatabase implements SwitchTenantTask
{
    public function makeCurrent(Tenant $tenant): void
    {
        // Here $tenant is an instance of your App\Models\Tenant,
        // but it's type-hinted against the interface
        DB::statement("CREATE DATABASE IF NOT EXISTS `{$tenant->database}`");
    }

    public function forgetCurrent(): void
    {
        // Nothing needed here
    }
}

