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
        $progress = Progress::orderBy('id')->pluck('id');
        foreach ($project as $key => $value) {
            for ($i=0; $i < rand(1, count($progress)); $i++) { 
                $random = rand(1, 7);
                ProjectProgress::insert([
                    'project_id' => $value->id,
                    'progress_id' => $progress[$i],
                    'start_date' => $value->start_date,
                    'due_date' => Carbon::parse($value->start_date)->addDays(($key+1) + $random),
                    'finish_date' => Carbon::parse($value->start_date)->addDays(($key+1) + $random + (rand(0, 1) ? rand(1, 2) : - rand(1, 3))),
                ]);
            }
        }
    }
}
