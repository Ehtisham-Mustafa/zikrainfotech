<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\TenantController;

Route::get('/tenants/create', [TenantController::class, 'create']);
Route::post('/tenants', [TenantController::class, 'store']);

