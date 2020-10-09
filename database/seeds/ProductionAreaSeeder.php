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
            'FOC I', 'FOC II', 'UTILITIES', 'OM 60 & NBM', 'OM 70', 'SRU & IPAL', 'LOC I', 
            'LOC II', 'LOC III', 'PARAXYLENE', 'RFCC', 'GTO', 'UTILITIES RFCC', 
            'LABORATORY', 'HSSE', 'WORKSHOP', 'MPS', 'ASET OPERATION'
        ];
        foreach ($data as $key => $value) {
            ProductionArea::insert([
                'name' => $value
            ]);
        }
    }
}