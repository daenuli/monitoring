<?php

use Illuminate\Database\Seeder;
use App\Models\ProductionArea;

class ProductionAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductionArea::truncate();
        ProductionArea::insert([
            [
                'name' => 'RFCC'
            ],
            [
                'name' => 'FOC 2'
            ],
            [
                'name' => 'LOC 3'
            ],
            [
                'name' => 'WH'
            ],
            [
                'name' => 'UTL'
            ]
        ]);
    }
}
