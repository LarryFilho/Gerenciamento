<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['name' => 'Churrasqueira'],
            ['name' => 'Piscina'],
            ['name' => 'Salão de Festas'],
        ];

        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
