<?php

namespace App\Services;

use App\Models\Tenant;

class TenantManager
{
    protected ?Tenant $tenant = null;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function set(Tenant $tenant): void {
        $this->tenant = $tenant;
    }

    public function current(): ?Tenant {
        return $this->tenant;
    }

    public function id(): ?int {
        return $this->tenant?->id;
    }

    public function hasTenant(): bool {
        return $this->tenant !== null;
    }

    public function clear(): void {
        $this->tenant = null;
    }
}
