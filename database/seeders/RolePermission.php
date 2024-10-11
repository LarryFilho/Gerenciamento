<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all permissions
        $permissions = Permission::all();

        // Create or find the 'porteiro' role
        $role = Role::firstOrCreate(['name' => 'porteiro']);

        // Sync permissions to the role
        $role->syncPermissions($permissions);
    }
}
