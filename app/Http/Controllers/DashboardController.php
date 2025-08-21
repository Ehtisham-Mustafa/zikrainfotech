<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Example: match tenant by the current host (e.g., fab.localhost)
        $host = $request->getHost();
            // dd(['host'=>$host]);
        $tenant = Tenant::where('domain', $host)->first();

        if (! $tenant) {
            abort(404, 'No tenant found for this domain.');
        }

        return view('dashboard', compact('tenant'));
    }
}
