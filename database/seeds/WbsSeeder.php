<?php

use Illuminate\Database\Seeder;
use App\Models\Wbs;

class WbsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wbs::truncate();
        Wbs::insert([
            [
                'name' => 'NON RUTIN'
            ],
            [
                'name' => 'OH'
            ],
            [
                'name' => 'RUTIN'
            ]
        ]);
    }
}
