<?php

namespace App\Models;

use Spatie\Multitenancy\Contracts\IsTenant;
use Spatie\Multitenancy\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements IsTenant
{
    protected $fillable = ['name', 'domain', 'database'];

    public static function booted()
    {
        static::creating(function ($tenant) {
            $tenant->database = 'tenant_' . strtolower(str_replace(' ', '_', $tenant->name));
        });
    }
}
