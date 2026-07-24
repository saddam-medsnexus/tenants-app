<?php

namespace App\Models\Scopes;

use App\Services\TenantManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function apply(Builder $builder, Model $model): void{
        $tenantManager = app(TenantManager::class);
        if(! $tenantManager->hasTenant()){
            return;
        }

        $builder->where(
            $model->getTable().'.tenant_id',
            $tenantManager->id()
        );
    }
}
