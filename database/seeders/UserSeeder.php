<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acme = Tenant::where('slug', 'acme')->first();
        $globex = Tenant::where('slug', 'globex')->first();

        User::create([
            'tenant_id' => $acme->id,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'tenant_id' => $globex->id,
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password')
        ]);
    }
}
