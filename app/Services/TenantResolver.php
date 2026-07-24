<?php

namespace App\Services;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantResolver
{
    protected array $reserved = ['www', 'admin', 'api'];
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected TenantManager $tenantManager
    ){}

    public function resolve(Request $request): ?Tenant {
        $tenant = $this->resolveByHost($request)
            ?? $this->resolveByPath($request);
        if($tenant){
            $this->tenantManager->set($tenant);
        }
        return $tenant;
    }

    public function resolveByHost(Request $request): ?Tenant{
        return null;
    }

    public function resolveByPath(Request $request): ?Tenant{
        $slug = $request->route('tenant');
        if(!$slug){
            return null;
        }

        return Tenant::query()
            ->where('slug', $slug)
            ->where('active', true)
            ->first();
    }
}
