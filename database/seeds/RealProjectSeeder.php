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
use App\Models\ProjectProductionArea;

class RealProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFileName = "real_project.csv";
        $csvFile = public_path($csvFileName);
        $data = $this->readCSV($csvFile,array('delimiter' => ';'));
        
        Project::truncate();
        $this->command->getOutput()->progressStart(count($data));
        foreach ($data as $key => $value) {
            if (isset($value[7]) && $value[7] != 1) {
                // MA
                if (!empty($value[11])) {
                    $DP = ($value[11] == 'GENMAINT')?'General Maintenance':$value[11];         
                    $direksi_id = MaintenanceArea::where('name', 'LIKE', $DP.'%')->value('id');
                } else {
                    $direksi_id = null;
                }

                // Sub Inisiasi
                if (!empty($value[2])) {
                    $sub_inisiasi_id = SubInitiation::where('name', 'LIKE', $value[2].'%')->value('id');
                } else {
                    $sub_inisiasi_id = null;
                }
                // $this->command->info($value[2]);

                // Notif
                if (!empty($value[3])) {
                    if (!preg_match('/[0-9]+/i', $value[3])) {
                        $notif = null;
                    } else {
                        $notif = $value[3];
                    }
                } else {
                    $notif = null;
                }

                // work_order
                if (!empty($value[4])) {
                    if (!preg_match('/[0-9]+/i', $value[4])) {
                        $work_order = null;
                    } else {
                        $work_order = $value[4];
                    }
                } else {
                    $work_order = null;
                }

                // nomor PR
                if (!empty($value[5])) {
                    if (!preg_match('/[0-9]+/i', $value[5])) {
                        $pr_number = null;
                    } else {
                        $pr_number = $value[5];
                    }
                } else {
                    $pr_number = null;
                }

                $planner_id = User::where('name', 'LIKE', $value[19].'%')->value('id');
                $project_title = $value[1];  
                $type = strtolower($value[6]);
                
                //start date of project
                // if (!empty($value[8])) {
                    // if (preg_match('/[a-zA-Z]+/i', $value[8], $matches)) {
                    //     return $matches;
                    // } else {
                    //     return 'hello';
                    // }
                    $exp = explode('/', $value[8]);
                    $month = (strlen($exp[1]) == 1) ? '0'.$exp[1] : $exp[1];
                    $fix_date = $exp[2].'-'.$month.'-'.$exp[0];
                    $start_date_project = $fix_date;           
                // } else {
                    // $start_date_project = null;
                // }

                
                $current_step = empty($value[9])?null:$value[9];           
                $step_date = $value[10];   

                $last_issue = $value[13];           
                $last_issue_date = $value[14];           
                $buyer_name = !empty($value[16])?$value[16]:null;           
                $vendor_name = !empty($value[17])?$value[17]:null; 
                $sp3mk = !empty($value[18])?$value[18]:null; 

                // if (!empty($value[0])) {
                //     $date = str_replace('/', '-', $value[0]);
                //     $date_result = date('Y-m-d', strtotime($date));
                //     $newDate = (strtotime($date_result) == 0) ? Carbon::now()->subDays($key * 20) : $date_result ;
                // } else {
                //     $newDate = Carbon::now()->subDays($key*2);
                // }
                $project_id = Project::create([
                    'user_id' => $planner_id,
                    'sub_inisiasi_id' => $sub_inisiasi_id,
                    'maintenance_area_id' => $direksi_id,
                    'work_order_number' => $work_order,
                    'reference_number' => null,
                    'notification_number' => $notif,
                    'purchase_order_number' => null,
                    'purchase_request_number' => $pr_number,
                    'spppmk_number' => $sp3mk,
                    'description' => $project_title,
                    'impact' => null,
                    'type' => $type,
                    'start_date' => $start_date_project,
                    'status' => 1,
                    'is_urgent' => 0,
                    'vendor_name' => $vendor_name,
                    'buyer_name' => $buyer_name,
                    'created_at' => $start_date_project,
                    'updated_at' => $start_date_project,
                ]);


                $this->command->getOutput()->progressAdvance();
            }
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
