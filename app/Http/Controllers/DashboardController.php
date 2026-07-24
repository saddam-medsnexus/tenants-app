<?php

namespace App\Http\Controllers;

use App\Services\TenantManager;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(TenantManager $tenantManager)
    {
        return response()->json([
            'tenant' => $tenantManager->current()?->name,
            'slug' => $tenantManager->current()?->slug
        ]);
    }
}
