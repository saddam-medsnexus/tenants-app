<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tenant = app(Tenant::class);
        return response()->json([
            'tenant' => $tenant->name,
            'slug' => $tenant->slug
        ]);
    }
}
