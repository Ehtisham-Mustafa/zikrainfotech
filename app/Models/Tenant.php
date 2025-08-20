<?php

namespace App\Models;

use Spatie\Multitenancy\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant
{
    protected $fillable = ['name', 'domain', 'database'];

    // optional helper to switch db name format
    public static function booted()
    {
        static::creating(function ($tenant) {
            $tenant->database = "tenant_{$tenant->id}";
        });
    }
}
