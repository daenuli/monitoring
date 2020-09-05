<?php

use Illuminate\Database\Seeder;
use App\Models\Progress;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Progress::truncate();
        Progress::insert([
            [
                'name' => 'AANWIJZING'
            ],
            [
                'name' => 'IZIN PRINSIP'
            ],
            [
                'name' => 'KOMEN BESTEK'
            ],
            [
                'name' => 'OPEN BID'
            ],
            [
                'name' => 'KIRIM PAKET'
            ],
            [
                'name' => 'SOURCING'
            ]
        ]);
    }
}
