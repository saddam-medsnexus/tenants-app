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
    public function __construct()
    {
        //
    }

    public function resolve(Request $request): ?Tenant {
        return $this->resolveByHost($request)
            ?? $this->resolveByPath($request);
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
