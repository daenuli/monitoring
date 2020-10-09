<?php

use Illuminate\Database\Seeder;
use App\Models\ProjectProductionArea;
use App\Models\ProductionArea;
use App\Models\Project;

class ProjectProductionAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = Project::all();
        ProjectProductionArea::truncate();
        foreach ($project as $key => $value) {
            $limit = rand(1, 2);
            $prod = ProductionArea::inRandomOrder()->limit($limit)->get();
            foreach ($prod as $row) { 
                ProjectProductionArea::insert([
                    'project_id' => $value->id,
                    'production_area_id' => $row->id,
                    'created_at' => $value->created_at,
                ]);
            }
        }
    }
}
