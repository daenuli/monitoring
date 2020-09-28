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
                'name' => 'IR',
                'description' => 'Instrumen'
            ],
            [
                'name' => 'MR',
                'description' => 'Mekanik' 
            ],
            [
                'name' => 'ER',
                'description' => 'Elektrikal' 
            ],
            [
                'name' => 'RR',
                'description' => 'Rotating' 
            ],
            [
                'name' => 'CR',
                'description' => 'Sipil' 
            ]
        ]);
    }
}
