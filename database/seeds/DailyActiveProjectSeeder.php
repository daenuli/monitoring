<?php

use Illuminate\Database\Seeder;
use App\Models\DailyActiveProject;
use App\Models\Project;

class DailyActiveProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = Project::where('status', 1)->get();

        DailyActiveProject::truncate();

        foreach ($project as $key => $value) {
            $startDate = $value->start_date;
            // $pj = Project::whereMonth('start_date', date('m', strtotime($startDate)))
            $pj = Project::where('start_date', '<=', $startDate)
            ->where('status', 1)->count();
            DailyActiveProject::insert(
                [
                    'total_project' => $pj,
                    'date' => $startDate
                ]
            );
        }
    }
}
