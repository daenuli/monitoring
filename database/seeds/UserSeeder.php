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
        $discipline = Discipline::pluck('id');
        User::truncate();
        User::insert([
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Tyffani Meirnadias',
                'email' => 'tyffani@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Dwi Hizzki Hanisa',
                'email' => 'dwi@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Baskoro Adiputro Purwono',
                'email' => 'baskoro@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Diny Gavisa',
                'email' => 'diny@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Aulia Gunawan',
                'email' => 'aulia@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Niluh Made Dwita Ginantar',
                'email' => 'dwita@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Andy Sigit Arifianto',
                'email' => 'andy@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Trawan Hardani',
                'email' => 'trawan@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Eko',
                'email' => 'eko@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Arfian',
                'email' => 'arfian@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Guntur',
                'email' => 'guntur@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Jody',
                'email' => 'jody@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ],
            [
                'nip' => $faker->nik(),
                'phone' => $faker->phoneNumber,
                'name' => 'Radyanta',
                'email' => 'radyanta@pertamina.com',
                'password' => bcrypt(111111),
                'status' => 1,
                'department' => 'Planning & Scheduling',
                'photo' => null,
                'discipline_id' => $faker->randomElement($discipline),
                'role' => 'planner'
            ]
        ]);
    }
}
