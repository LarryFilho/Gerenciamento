<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
<<<<<<< Updated upstream
    public function run()
    {
        // Ensure the role 'porteiro' exists
        $porteiroRole = Role::firstOrCreate(['name' => 'porteiro']);
        
        // Create a user
        $user = User::create([
            'name' => 'Douglas',
            'email' => 'douglas@gmail.com',
            'password' => bcrypt('senha'),
        ]);

        // Assign the 'porteiro' role to the user
        $user->assignRole('porteiro');
=======
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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