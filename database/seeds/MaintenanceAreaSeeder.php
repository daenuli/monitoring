<?php

use Illuminate\Database\Seeder;
use App\Models\MaintenanceArea;

class MaintenanceAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaintenanceArea::truncate();
        $MA = [
            'MA 1', 'MA 2', 'MA 3', 'MA 4', 'MA 5', 'MA 6', 'MA 7', 
            'Workshop', 'EIIE', 'P&S', 'General Maintenance', 'SSIE', 'Stat. Eng'
        ];
        foreach ($MA as $key => $value) {
            MaintenanceArea::insert([
                'name' => $value
            ]);
        }
    }
}