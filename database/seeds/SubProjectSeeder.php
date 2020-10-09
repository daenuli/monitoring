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

        $parents = Project::where('id', '<=', 20)->pluck('id');
        $project = Project::where([
            ['id', '>', 30],
            ['id', '<', 100]
        ])->whereNull('parent_id')->get();
        foreach ($project as $key => $value) {
            Project::where('id', $value->id)->update([
                'parent_id' => $faker->randomElement($parents)
            ]);
        }
    }
}
