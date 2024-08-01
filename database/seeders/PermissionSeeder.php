<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'user-management']);

        foreach (config('import') as $permission) {
            Permission::create(['name' => $permission['permission_required']]);
        }
    }
}
