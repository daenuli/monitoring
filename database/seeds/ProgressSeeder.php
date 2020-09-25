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
                'name' => 'Sourcing',
                'estimation' => 10,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Penyusunan RKS & RAB',
                'estimation' => 15,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Review & Revisi RKS',
                'estimation' => 10,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Kirim Paket',
                'estimation' => 2,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Pra Kualifikasi',
                'estimation' => 5,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Aanwijzing',
                'estimation' => 5,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Approval HPS OE',
                'estimation' => 5,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Open Bid',
                'estimation' => 5,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'LH Pemenang',
                'estimation' => 3,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Penerbitan SP3MK',
                'estimation' => 5,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'SPB',
                'estimation' => 25,
                'type' => 'jasa',
                'is_urgent' => 0
            ],

            [
                'name' => 'Sourcing',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Penyusunan RKS & RAB',
                'estimation' => 2,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Review & Revisi RKS',
                'estimation' => 2,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Kirim Paket',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Pra Kualifikasi',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Aanwijzing',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Approval HPS OE',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Open Bid',
                'estimation' => 2,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'LH Pemenang',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Penerbitan SP3MK',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'SPB',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],

            

            // Barang
            [
                'name' => 'Reservasi Gudang',
                'estimation' => 3,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Sourcing',
                'estimation' => 7,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Buat KIMAP',
                'estimation' => 2,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Purchase Request',
                'estimation' => 3,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Purchase Order',
                'estimation' => 3,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Good receive',
                'estimation' => 3,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Good Issue',
                'estimation' => 3,
                'type' => 'barang',
                'is_urgent' => 0
            ],

            [
                'name' => 'Reservasi Gudang',
                'estimation' => 3,
                'type' => 'barang',
                'is_urgent' => 1
            ],
            [
                'name' => 'Good Issue',
                'estimation' => 3,
                'type' => 'barang',
                'is_urgent' => 1
            ]
        ]);
    }
}
