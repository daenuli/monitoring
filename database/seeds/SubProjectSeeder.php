<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class SubProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $parents = Project::where('id', '<=', 20)->whereNull('parent_id')->pluck('id');
        
        $project = Project::where('id', $faker->unique()->numberBetween(30,100))->whereNull('parent_id')->pluck('id');
        foreach ($project as $key => $value) {
            Project::where('id');
        }
    }
}
