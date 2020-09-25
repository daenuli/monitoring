<?php

use Illuminate\Database\Seeder;
use App\Models\BudgetDiscipline;

class BudgetDisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BudgetDiscipline::truncate();
        BudgetDiscipline::insert([
            [
                'name' => 'ER',
            ],
            [
                'name' => 'IR',
            ],
            [
                'name' => 'MR',
            ],
            [
                'name' => 'RR',
            ]
        ]);
    }
}
