<?php

use Illuminate\Database\Seeder;
use App\Models\ProjectInitiation;
use App\Models\Project;
use App\Models\Initiation;

class ProjectInitiationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectInitiation::truncate();
        $project = Project::all();
        $initiation = Initiation::pluck('id');
        foreach ($project as $key => $value) {
            foreach ($initiation as $j => $val) {
            // }
            // for ($i=0; $i < rand(1, count($initiation)); $i++) {
                ProjectInitiation::insert([
                    'project_id' => $value->id,
                    'inisiasi_id' => $val,
                ]);
            }
        }
    }
}
