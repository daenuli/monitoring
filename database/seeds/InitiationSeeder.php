<?php

use Illuminate\Database\Seeder;
use App\Models\Initiation;

class InitiationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Initiation::truncate();
        Initiation::insert([
            [
                'name' => 'RKU'
            ],
            [
                'name' => 'RKAP'
            ],
            [
                'name' => 'Non RKAP'
            ],
            [
                'name' => 'MOC'
            ],
            [
                'name' => 'Surat Urgent'
            ]
        ]);
    }
}
