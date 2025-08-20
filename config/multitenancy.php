<?php

use Spatie\Multitenancy\Tasks\SwitchTenantDatabaseTask;
use Spatie\Multitenancy\Tasks\PrefixCacheTask;
use Spatie\Multitenancy\TenantFinder\DomainTenantFinder;

return [

    /*
     * The tenant model class.
     */
    'tenant_model' => App\Models\Tenant::class,

    /*
     * How to find the tenant from the request.
     * Common: DomainTenantFinder (subdomain/domain), or you can write your own.
     */
    'tenant_finder' => DomainTenantFinder::class,

    /*
     * These tasks are run when switching tenants.
     * Examples:
     * - SwitchTenantDatabaseTask: changes DB connection
     * - PrefixCacheTask: prefixes cache keys with tenant id
     * You can add your own tasks too.
     */
'switch_tenant_tasks' => [
    App\Actions\CreateTenantDatabase::class,
    Spatie\Multitenancy\Tasks\SwitchTenantDatabaseTask::class,
    Spatie\Multitenancy\Tasks\PrefixCacheTask::class,
],



    /*
     * Central domains are ignored by the tenant finder.
     * Useful for admin panel, landing pages, etc.
     */
    'central_domains' => [
        'app.test',
        'localhost',
    ],

    /*
     * Database connection used for tenants.
     * This connection will be swapped when tenants change.
     */
    'tenant_database_connection_name' => 'tenant',

    /*
     * Database connection for the central (system) app.
     */
    'landlord_database_connection_name' => 'mysql',
];
