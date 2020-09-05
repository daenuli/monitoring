<?php

use Illuminate\Database\Seeder;
use App\Models\Discipline;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discipline::truncate();
        Discipline::insert([
            [
                'name' => 'IR'
            ],
            [
                'name' => 'MR'
            ],
            [
                'name' => 'ER'
            ],
            [
                'name' => 'RR'
            ],
            [
                'name' => 'CR'
            ]
        ]);
    }
}
