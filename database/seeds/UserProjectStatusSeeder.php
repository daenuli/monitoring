<?php

use Illuminate\Database\Seeder;
use App\Models\UserProjectStatus;
use App\Models\Project;
use App\Models\Progress;

class UserProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $project = Project::all();
        $progress = Progress::pluck('id');
        UserProjectStatus::truncate();
        foreach ($project as $value) {
            $UPS[] = [
                'project_id' => $value->id,
                'progress_id' => $faker->randomElement($progress),
                'status' => rand(0, 1)
            ];
        }
        UserProjectStatus::insert($UPS);
    }
}
