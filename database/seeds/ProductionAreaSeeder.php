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
        $data = [
            'FOC 1', 'FOC 2', 'GTO', 'GTO-RFCC', 
            'HSE', 'UTL', 'LOC III', 'OM 60', 
            'OM 70', 'PX', 'RFCC', 'SRU', 'UTIL RFCC', 'UTL', 'UTL RFCC', 'ALL AREA'
        ];
        foreach ($data as $key => $value) {
            ProductionArea::insert([
                'name' => $value
            ]);
        }
    }
}
