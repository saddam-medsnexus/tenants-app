<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Services\TenantManager;
use App\Services\TenantResolver;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenant
{
    public function __construct(
        protected TenantResolver $resolver,
        protected TenantManager $manager
    ){}
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $tenant = $this->resolver->resolve($request);
        if(! $tenant){
            abort(404, 'Tenant not found.');
        }
        app()->instance(Tenant::class, $tenant);
        return $next($request);
    }
}
