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
        MaintenanceArea::insert([
            [
                'name' => 'MA 1'
            ],
            [
                'name' => 'MA 2'
            ],
            [
                'name' => 'MA 3'
            ],
            [
                'name' => 'MA 4'
            ],
            [
                'name' => 'MA 5'
            ],
            [
                'name' => 'MA 6'
            ],
            [
                'name' => 'MA 7'
            ]
        ]);
    }
}
