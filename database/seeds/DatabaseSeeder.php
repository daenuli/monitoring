<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DisciplineSeeder::class);
        $this->call(InitiationSeeder::class);
        $this->call(ProgressSeeder::class);
        $this->call(MaintenanceAreaSeeder::class);
        $this->call(ProductionAreaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectInitiationSeeder::class);
        $this->call(ProjectProgressSeeder::class);
    }
}
