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
use App\Models\ProjectIssue;
use App\Models\ProjectProgress;

class RealProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $csvFileName = "real_project_old1.csv";
        $csvFileName = "real_project.csv";
        $csvFile = public_path($csvFileName);
        $data = $this->readCSV($csvFile,array('delimiter' => ';'));
        
        Project::truncate();
        ProjectIssue::truncate();
        ProjectProductionArea::truncate();
        ProjectProgress::truncate();

        $this->command->getOutput()->progressStart(count($data));
        foreach ($data as $keyData => $value) {
            if(isset($value[18])){

                // MA
                if (!empty($value[10])) {
                    $DP = $value[10];         
                    // $DP = ($value[10] == 'GENMAINT')?'General Maintenance':$value[10];         
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
                        $notif = $value[3];
                    // if (!preg_match('/[0-9]+/i', $value[3])) {
                    //     $notif = null;
                    // } else {
                    //     $notif = $value[3];
                    // }
                } else {
                    $notif = null;
                }

                // work_order
                if (!empty($value[4])) {
                    $work_order = $value[4];
                    // if (!preg_match('/[0-9]+/i', $value[4])) {
                    //     $work_order = null;
                    // } else {
                    //     $work_order = $value[4];
                    // }
                } else {
                    $work_order = null;
                }

                // nomor PR
                if (!empty($value[5])) {
                        $pr_number = $value[5];
                    // if (!preg_match('/[0-9]+/i', $value[5])) {
                    //     $pr_number = null;
                    // } else {
                    //     $pr_number = $value[5];
                    // }
                } else {
                    $pr_number = null;
                }
                $planner_id = User::where('name', $value[18])->first();
                $project_title = $value[1];  
                $type = strtolower($value[6]);
                
                //start date of project
                // if (!empty($value[7])) {
                    // if (preg_match('/[a-zA-Z]+/i', $value[7], $matches)) {
                    //     return $matches;
                    // } else {
                    //     return 'hello';
                    // }
                    $exp = explode('/', $value[7]);
                    $month = (strlen($exp[1]) == 1) ? '0'.$exp[1] : $exp[1];
                    $fix_date = $exp[2].'-'.$month.'-'.$exp[0];
                    $start_date_project = $fix_date;           
                // } else {
                    // $start_date_project = null;
                // }

                        
                $buyer_name = !empty($value[15])?$value[15]:null;           
                $vendor_name = !empty($value[16])?$value[16]:null; 
                $sp3mk = !empty($value[17])?$value[17]:null; 

                $projects = Project::create([
                    'user_id' => $planner_id->id,
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

                if (!empty($value[8])) {
                    $current_step = $value[8];           
                    $start_date_progress = $value[9];                
                    $PG_ID = Progress::where([
                        ['type', 'jasa'],
                        ['is_urgent', 0],
                        ['name', 'LIKE', $current_step.'%'],
                    ])->first();
                    $PG = Progress::where('id', '<=', $PG_ID->id)->orderBy('id', 'asc')->get();
                    $index = 19;  
                    $step_start_date = $value[$index]; 
                    foreach ($PG as $j => $PGS) {
                        $PP = ProjectProgress::where('project_id', $projects->id)
                                ->orderBy('id', 'desc')
                                ->first();
                        $start = !empty($PP) ? $PP->finish_date : $start_date_project;

                        
                        $estimation[$keyData][$j] = $PGS->estimation;
                        // $this->command->info('project : '.$projects->id.', progress : '.$PGS->id.', estimation : '.$PGS->estimation. ', total : '.array_sum($estimation[$keyData]));
                        $due_date = Carbon::parse($start_date_project)->addDays(array_sum($estimation[$keyData]));
                        // ProjectProgress::create([
                        //     'project_id' => $projects->id,
                        //     'progress_id' => $PGS->id,
                        //     // 'start_date' => NULL,
                        //     // 'start_date' => $start,
                        //     'start_date' => $start,
                        //     'due_date' => $due_date,
                        //     'finish_date' => $due_date
                        // ]);
                        ProjectProgress::create([
                            'project_id' => $projects->id,
                            'progress_id' => $PGS->id,
                            // 'start_date' => NULL,
                            // 'start_date' => $start,
                            // 'due_date' => $due_date,
                            'due_date' => $due_date,
                            'start_date' => Carbon::CreateFromFormat('d/m/Y', $value[$index+$j])->format('Y-m-d'),
                            // 'due_date' => !empty($value[$index+($j+1)])?Carbon::CreateFromFormat('d/m/Y', $value[$index+($j+1)])->format('Y-m-d'):NULL,
                            'finish_date' => !empty($value[$index+($j+1)])?Carbon::CreateFromFormat('d/m/Y', $value[$index+($j+1)])->format('Y-m-d'):NULL
                        ]);
                    }
                }
                
                if (!empty($value[11])) {
                    $AH = explode(',', $value[11]);
                    // $this->command->info($value[0]);
                    foreach ($AH as $vl) {
                        $PA = ProductionArea::where('name', $vl)->first();
                        // foreach ($PA as $prod) {
                            ProjectProductionArea::insert([
                                'project_id' => $projects->id,
                                'production_area_id' => $PA->id,
                                'created_at' => $start_date_project,
                            ]);
                        // }
                    }
                }

                $last_issue_date = $value[13]; 
                if (!empty($last_issue_date)) {
                    $issue_content = !empty($value[12])?$value[12]:NULL;

                    $exp_issue = explode('/', $last_issue_date);
                    $month_issue = (strlen($exp_issue[1]) == 1) ? '0'.$exp_issue[1] : $exp_issue[1];
                    $fix_date_issue = $exp_issue[2].'-'.$month_issue.'-'.$exp_issue[0];
                    $issue_date = $fix_date_issue;  

                    ProjectIssue::insert([
                        'project_id' => $projects->id,
                        'description' => $issue_content,
                        'created_at' => $projects->created_at
                    ]);
                }

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
