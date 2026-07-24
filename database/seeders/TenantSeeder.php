<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::create([
            'name' => 'Acme Corporation',
            'slug' => 'acme',
            'domain' => null,
            'plan' => 'free',
            'active' => true
        ]);
        Tenant::create([
            'name' => 'Globex Corporation',
            'slug' => 'globex',
            'domain' => null,
            'plan' => 'free',
            'active' => true
        ]);
        Tenant::create([
            'name' => 'Umbrella Corp',
            'slug' => 'umbrella',
            'domain' => null,
            'plan' => 'free',
            'active' => true
        ]);
    }
}
