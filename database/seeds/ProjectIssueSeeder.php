<?php

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectIssue;
use Carbon\Carbon;

class ProjectIssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $project = Project::orderBy('id')->get();
        ProjectIssue::truncate();
        $this->command->getOutput()->progressStart($project->count());
        foreach ($project as $key => $value) {
            for ($i=0; $i < rand(1, 5); $i++) { 
                ProjectIssue::insert([
                    'project_id' => $value->id,
                    'description' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                    'created_at' => Carbon::parse($value->start_date)->addDay(1+$i)
                ]);
            }
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
