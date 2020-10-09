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
        // $this->call(BudgetDisciplineSeeder::class);
        // $this->call(WbsSeeder::class);
        // $this->call(BudgetSeeder::class);
        // $this->call(InitiationSeeder::class);
        $this->call(SubInitiationSeeder::class);
        $this->call(ProgressSeeder::class);
        $this->call(MaintenanceAreaSeeder::class);
        $this->call(ProductionAreaSeeder::class);
        $this->call(DisciplineSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RealProjectSeeder::class);
        
        // $this->call(ProjectSeeder::class);
        // $this->call(ProjectIssueSeeder::class);
        // $this->call(ProjectProgressSeeder::class);
        // $this->call(DailyActiveProjectSeeder::class);
        // $this->call(SubProjectSeeder::class);
        // $this->call(ProjectProductionAreaSeeder::class);
    }
}
