<?php

use Illuminate\Database\Seeder;
use App\Models\MaintenanceArea;
use App\Models\ProductionArea;
use App\Models\Project;
use App\User;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate();
        $faker = Faker\Factory::create();
        $user = User::orderBy('id')->get();
        $ma = MaintenanceArea::pluck('id');
        $pa = ProductionArea::pluck('id');
        foreach($user as $row) {
            for ($i=1; $i <= rand(1, 4); $i++) {
                Project::insert([
                    'user_id' => $row->id,
                    'production_area_id' => $faker->randomElement($ma),
                    'maintenance_area_id' => $faker->randomElement($pa),
                    'work_order_number' => $faker->numberBetween($min = 1000, $max = 9000),
                    'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'description' => $faker->text($maxNbChars = 200),
                    'type' => $faker->randomElement(['jasa', 'barang']),
                    'due_date' => Carbon::now()->addDays($i * rand(2, 9)),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
