<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Discipline;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create("id_ID");
        // $discipline = Discipline::pluck('id');
        $users = [
            [
                'discipline' => 'Rotating',
                'name' => 'Aulia Gunawan'
            ],
            [
                'discipline' => 'Rotating',
                'name' => 'Baskoro Adiputro Purwono'
            ],
            [
                'discipline' => 'Mekanik',
                'name' => 'Nurul Komari'
            ],
            [
                'discipline' => 'Mekanik',
                'name' => 'Guntur Yulianto'
            ],
            [
                'discipline' => 'Mekanik',
                'name' => 'Eko Prasetyo'
            ],
            [
                'discipline' => 'Sipil',
                'name' => 'Niluh Made Dwita Ginantari'
            ],
            [
                'discipline' => 'Mekanik',
                'name' => 'Trawan Hardani'
            ],
            [
                'discipline' => 'Instrumen',
                'name' => 'Tyffani Meirnadias'
            ],
            [
                'discipline' => 'Instrumen',
                'name' => 'Dwi Hizzki Hanisa'
            ],
            [
                'discipline' => 'Electrical',
                'name' => 'Jody Raditya Siswandito'
            ],
            [
                'discipline' => 'Electrical',
                'name' => 'Diny Gavisa'
            ],
            [
                'discipline' => 'Sipil',
                'name' => 'Arfiansyah Galih Saputra'
            ],
            [
                'discipline' => 'Rotating',
                'name' => 'Radyanta Purwonugroho'
            ],
            [
                'discipline' => 'Mekanik',
                'name' => 'Akhmad Rizal Amri'
            ],
            [
                'discipline' => 'Mekanik',
                'name' => 'Catur Harjono',
                'email' => 'catur.harjono@pertamina.com',
                'role' => 'ma',
            ],
            [
                'discipline' => 'Mekanik',
                'name' => 'Rifqi Anda',
                'email' => 'rifqi.anda@pertamina.com',
                'role' => 'ma',
            ]
        ];

        User::truncate();

        foreach ($users as $key => $value) {
            $discipline = Discipline::where('description', $value['discipline'])->value('id');
            // $this->command->info("Disciplin : ".$value['discipline']);
            User::insert([
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => $value['name'],
                'email' => isset($value['email'])?$value['email']:strtolower(explode(' ',$value['name'])[0]).'@pertamina.com',
                'password' => 'PertaminaRU4',
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $discipline,
                'role' => isset($value['role'])?$value['role']:'planner'
            ]);
        }
    }
}
