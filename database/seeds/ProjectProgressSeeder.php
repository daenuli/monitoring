<?php

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Progress;
use App\Models\ProjectProgress;
use Carbon\Carbon;

class ProjectProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        ProjectProgress::truncate();
        $project = Project::all();
        $this->command->getOutput()->progressStart($project->count());
        foreach ($project as $key => $value) {
            $estimation = [];
            $startDate = $value->start_date;
            $progress = Progress::orderBy('id', 'asc')->where([
                ['type', $value->type],
                ['is_urgent', $value->is_urgent]
            ])->get();
            foreach($progress as $i => $row) {
                $PP = ProjectProgress::where('project_id', $value->id)
                        ->orderBy('id', 'desc')
                        ->value('finish_date');
                $estimation[$i] = $row->estimation;

                $H_min_due_date = Carbon::parse($startDate)->addDays(array_sum($estimation) - 1);
                $H_plus_due_date = Carbon::parse($startDate)->addDays(array_sum($estimation) + rand(0, 2));

                $due_date = Carbon::parse($startDate)->addDays(array_sum($estimation));
                $min_due_date = Carbon::parse($startDate)->addDays(array_sum($estimation)-1);

                $start = ($PP) ? $PP : $startDate;
                $finish_date = rand(0, 1) ? $H_min_due_date : $H_plus_due_date;

                if ($due_date->diffInDays($start) == 0 ||$due_date->diffInDays($start) == 1) {
                    $finish_date = rand(0, 1) ? $due_date : $H_plus_due_date;
                } 

                // if ($due_date->diffInDays($start) == 1) {
                //     $finish_date = rand(0, 1) ? $due_date : $H_plus_due_date;
                // }
                
                ProjectProgress::create([
                    'project_id' => $value->id,
                    'progress_id' => $row->id,
                    'start_date' => $start,
                    'due_date' => $due_date,
                    // 'finish_date' => $min_due_date
                    // 'finish_date' => $due_date
                    'finish_date' => $finish_date
                ]);
            }
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
