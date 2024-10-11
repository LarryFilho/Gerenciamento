<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< Updated upstream
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
=======
>>>>>>> Stashed changes

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< Updated upstream
        // Fetch all permissions
        $permissions = Permission::all();

        // Create or find the 'porteiro' role
        $role = Role::firstOrCreate(['name' => 'porteiro']);

        // Sync permissions to the role
        $role->syncPermissions($permissions);
=======
        $user = User::create([
            'name' => 'Douglas', 
            'email' => 'douglas@gmail.com',
            'password' => bcrypt('senha')
        ]);
    
        $role = Role::create(['name' => 'porteiro']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
>>>>>>> Stashed changes
    }
}
