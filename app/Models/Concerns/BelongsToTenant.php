<?php

namespace App\Models\Concerns;

use App\Models\Scopes\TenantScope;
use App\Services\TenantManager;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant(): void{
        static::addGlobalScope(new TenantScope);
        static::creating(function($model){
            $tenantManager = app(TenantManager::class);
            if(! $tenantManager->hasTenant()){
                return;
            }
            if(empty($model->tenant_id)){
                $model->tenant_id = $tenantManager->id();
            }
        });
    }
}