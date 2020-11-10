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
                'email' => strtolower(explode(' ',$value['name'])[0]).'@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $discipline,
                'role' => 'planner'
            ]);
        }
    }
}
