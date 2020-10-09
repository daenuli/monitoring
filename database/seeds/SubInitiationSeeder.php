<?php

use Illuminate\Database\Seeder;
use App\Models\Initiation;
use App\Models\SubInitiation;

class SubInitiationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubInitiation::truncate();
        SubInitiation::insert([
            [
                'inisiasi_id' => 1,
                'name' => 'RKU'
            ],
            [
                'inisiasi_id' => 1,
                'name' => 'RKAP'
            ],
            [
                'inisiasi_id' => 1,
                'name' => 'MOC'
            ],
            [
                'inisiasi_id' => 2,
                'name' => 'Surat Urgent'
            ],
            [
                'inisiasi_id' => 2,
                'name' => 'NON RKAP'
            ]
        ]);
    }
}
