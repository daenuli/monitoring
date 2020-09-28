<?php

use Illuminate\Database\Seeder;
use App\Models\MaintenanceArea;
use App\Models\ProductionArea;
use App\Models\Project;
use App\User;
use Carbon\Carbon;
use App\Models\Initiation;
use App\Models\SubInitiation;
use App\Models\Progress;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFileName = "project.csv";
        $csvFile = public_path($csvFileName);
        $data = $this->readCSV($csvFile,array('delimiter' => ';'));
        
        Project::truncate();
        $faker = Faker\Factory::create();
        $user = User::orderBy('id')->pluck('id');
        $inisiasi = Initiation::orderBy('id')->pluck('id');
        $subinisiasi = SubInitiation::orderBy('id')->pluck('id');
        // $user = User::orderBy('id')->get();
        $ma = MaintenanceArea::pluck('id');
        $pa = ProductionArea::pluck('id');
        $progress = Progress::pluck('id');
        $this->command->getOutput()->progressStart(count($data));

        // foreach($user as $key => $row) {
            // for ($i=1; $i <= rand(1, 4); $i++) {
                foreach ($data as $key => $value) {
                    if($key == 500) {
                        break;
                    }
                    if (!empty($value[0])) {
                        $date = str_replace('/', '-', $value[0]);
                        $date_result = date('Y-m-d', strtotime($date));
                        $newDate = (strtotime($date_result) == 0) ? Carbon::now()->subDays($key * 20) : $date_result ;
                    } else {
                        $newDate = Carbon::now()->subDays($key*2);
                        // $newDate = Carbon::now()->subDays($key * 20);
                    }
                    // $row[] = $value;
                    Project::insert([
                        'user_id' => $faker->randomElement($user),
                        // 'inisiasi_id' => $faker->randomElement($inisiasi),
                        'sub_inisiasi_id' => $faker->randomElement($subinisiasi),
                        'production_area_id' => $faker->randomElement($pa),
                        'maintenance_area_id' => $faker->randomElement($ma),
                        'work_order_number' => !empty($value[4]) ? $value[4] : '82010'.$faker->numberBetween($min = 10000, $max = 90000),
                        'reference_number' => !empty($value[1]) ? $value[1] : $faker->numberBetween($min = 10000, $max = 90000),
                        'notification_number' => (!empty($value[3]) && ($value[3] != '-')) ? $value[3] : '21010'.$faker->numberBetween($min = 10000, $max = 90000),
                        'purchase_order_number' => !empty($value[5]) ? $value[5] : '39500'.$faker->numberBetween($min = 10000, $max = 90000),
                        'purchase_request_number' => !empty($value[6]) ? $value[6] : '5000'.$faker->numberBetween($min = 1000, $max = 9000),
                        'spppmk_number' => $faker->numberBetween($min = 1000, $max = 9000),
                        'description' => !empty($value[2]) ? $value[2] : $faker->sentence($nbWords = 4, $variableNbWords = true),
                        'impact' => !empty($value[8]) ? $value[8] : $faker->sentence($nbWords = 4, $variableNbWords = true),
                        'type' => $faker->randomElement(['jasa', 'barang']),
                        'start_date' => $newDate,
                        // 'start_date' => Carbon::now()->subDays($key * 20),
                        // 'start_date' => Carbon::now()->subDays($i * rand(2, 9)),
                        'status' => rand(0, 1),
                        'is_urgent' => rand(0, 1),
                        'vendor_name' => !empty($value[7]) ? $value[7] : $faker->company,
                        'buyer_name' => $faker->name,
                        'created_at' => $newDate,
                        // 'created_at' => Carbon::now()->subDays($key * 20),
                        'updated_at' => $newDate,
                        // 'updated_at' => Carbon::now()->subDays($key * 20),
                    ]);
                    $this->command->getOutput()->progressAdvance();

                }
        $this->command->getOutput()->progressFinish();

            // }
        // }
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
