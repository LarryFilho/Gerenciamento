<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionTableSeeder::class,
<<<<<<< Updated upstream
            RolePermission::class,
=======
>>>>>>> Stashed changes
            CreateAdminUserSeeder::class,  
            UserSeeder::class,
            AptoSeeder::class, 
        ]);
    }
}
