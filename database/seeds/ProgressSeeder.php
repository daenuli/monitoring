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

            // Jasa Non Urgent
            [
                'name' => 'Sourcing',
                'estimation' => 15,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Penyusunan RKS & RAB',
                'estimation' => 30,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Review & Revisi RKS',
                'estimation' => 6,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Izin Prinsip/ Persetujuan',
                'estimation' => 7,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Pengajuan Proses Tender',
                'estimation' => 2,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Pre bid meeting',
                'estimation' => 14,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Approval HPS OE',
                'estimation' => 14,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Open Bid',
                'estimation' => 14,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Penunjukan Pemenang',
                'estimation' => 14,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'Penerbitan SP3MK',
                'estimation' => 4,
                'type' => 'jasa',
                'is_urgent' => 0
            ],
            [
                'name' => 'SPB',
                'estimation' => 30,
                'type' => 'jasa',
                'is_urgent' => 0
            ],

            // Jasa Urgent
            [
                'name' => 'Sourcing',
                'estimation' => 5,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Penyusunan RKS & RAB',
                'estimation' => 7,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Review & Revisi RKS',
                'estimation' => 0,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Izin Prinsip/ Persetujuan',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Pengajuan Proses Tender',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Pre bid meeting',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Approval HPS OE',
                'estimation' => 0,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Open Bid',
                'estimation' => 1,
                'type' => 'jasa',
                'is_urgent' => 1
            ],
            [
                'name' => 'Penunjukan Pemenang',
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
                'estimation' => 30,
                'type' => 'jasa',
                'is_urgent' => 1
            ],

            // Barang
            [
                'name' => 'Sourcing',
                'estimation' => 14,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Review Spesifikasi',
                'estimation' => 10,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Approval HPS OE',
                'estimation' => 14,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Pengajuan Proses Tender',
                'estimation' => 2,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Pre bid meeting',
                'estimation' => 15,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Open bid',
                'estimation' => 15,
                'type' => 'barang',
                'is_urgent' => 0
            ],
            [
                'name' => 'Penunjukan Pemenang',
                'estimation' => 15,
                'type' => 'barang',
                'is_urgent' => 0
            ],

            [
                'name' => 'Terbit PO',
                'estimation' => 15,
                'type' => 'barang',
                'is_urgent' => 1
            ],

            [
                'name' => 'Sourcing',
                'estimation' => 14,
                'type' => 'barang',
                'is_urgent' => 1
            ],
            [
                'name' => 'Review Spesifikasi',
                'estimation' => 10,
                'type' => 'barang',
                'is_urgent' => 1
            ],
            [
                'name' => 'Approval HPS OE',
                'estimation' => 14,
                'type' => 'barang',
                'is_urgent' => 1
            ],
            [
                'name' => 'Pengajuan Proses Tender',
                'estimation' => 2,
                'type' => 'barang',
                'is_urgent' => 1
            ],
            [
                'name' => 'Pre bid meeting',
                'estimation' => 15,
                'type' => 'barang',
                'is_urgent' => 1
            ],
            [
                'name' => 'Open bid',
                'estimation' => 15,
                'type' => 'barang',
                'is_urgent' => 1
            ],
            [
                'name' => 'Penunjukan Pemenang',
                'estimation' => 15,
                'type' => 'barang',
                'is_urgent' => 1
            ],

            [
                'name' => 'Terbit PO',
                'estimation' => 15,
                'type' => 'barang',
                'is_urgent' => 1
            ]
        ]);
    }
}
