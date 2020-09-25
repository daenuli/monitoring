<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Budget;
use App\Models\Wbs;
use App\Models\BudgetDiscipline;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();
        $csvFileName = "budget.csv";
        $csvFile = public_path($csvFileName);
        $data = $this->readCSV($csvFile,array('delimiter' => ';'));
        $this->command->getOutput()->progressStart(count($data));
        Budget::truncate();
        $DIS_ID = BudgetDiscipline::pluck('id');
        $WBS_ID = Wbs::pluck('id');
        foreach ($data as $key => $value) {
            $discipline_name = !empty($value[4]) ? Str::replaceFirst('4', '', $value[4]) : null;
            $wbs_name = !empty($value[2]) ? $value[2] : null;
            $discipline = BudgetDiscipline::where('name', $discipline_name)->value('id');
            $wbs = Wbs::where('name', $wbs_name)->value('id');
            Budget::insert([
                "work_order_number" => !empty($value[0]) ? $value[0] : '82010'.$faker->numberBetween($min = 10000, $max = 90000),
                'description' => !empty($value[3]) ? $value[3] : $faker->sentence($nbWords = 4, $variableNbWords = true),
                "budget_discipline_id" => !empty($discipline) ? $discipline : $faker->randomElement($DIS_ID),
                "wbs_id" => !empty($wbs) ? $wbs : $faker->randomElement($WBS_ID),
                "budget" => !empty($value[5]) ? str_replace(',', '', $value[5]) : null,
                "actual" => !empty($value[6]) ? str_replace(',', '', $value[6]) : null,
                "commitment" => !empty($value[7]) ? str_replace(',', '', $value[7]) : null,
                "rop" => !empty($value[8]) ? str_replace(',', '', $value[8]) : null,
                "year" => !empty($value[1]) ? $value[1] : date('Y')
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }

    public function readCSV($csvFile, $array)
    {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }
        fclose($file_handle);
        return $line_of_text;
    }
}
