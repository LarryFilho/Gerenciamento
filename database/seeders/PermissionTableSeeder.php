<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'criar-produto',
           'deletar-produto',
           'editar-produto',
           'visualizar-produto',
           'criar-encomenda',
           'deletar-encomenda',
           'editar-encomenda',
           'visualizar-encomenda',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}