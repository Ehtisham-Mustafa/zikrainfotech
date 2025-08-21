<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Actions\CreateTenantDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Spatie\Multitenancy\Actions\MakeTenantCurrentAction;


class TenantController extends Controller
{
    public function create()
    {
        return view('tenants.create');
    }

    public function store(Request $request)
    {

        $landlordDB=DB::connection('mysql');
        $request->validate([
            'name' => 'required|string|unique:tenants,name',
            'domain' => 'required|string|unique:tenants,domain',
        ]);

        $dbName = 'tenant_' . strtolower(str_replace(' ', '_', $request->name));

        $tenant = Tenant::create([
            'name' => $request->name,
            'domain' => $request->domain,
            'database' => $dbName,
        ]);

        // Create tenant database
        (new CreateTenantDatabase())->makeCurrent($tenant);
        $tenants = $landlordDB->table('tenants')->pluck('database');
        foreach ($tenants as $tenantDatabase) {
            // Correct config key (no spaces!)
            Config::set('database.connections.tenant.database', $tenantDatabase);

            // Reset tenant connection
            DB::purge('tenant');
             DB::reconnect('tenant');

        }


        // Switch to tenant DB and run migrations
        app(MakeTenantCurrentAction::class)->execute($tenant);

        Artisan::call('migrate', [
            '--database' => 'tenant',
            '--path' => 'database/migrations/tenant',
            '--force' => true,
        ]);

        return view('tenants.created', compact('tenant'));
    }

}
