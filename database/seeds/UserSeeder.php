<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Admin Rental',
                'email' => 'rentalfield22@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fatimah Badriyah',
                'email' => 'faatimahbadriyah@gmail.com',
                'password' => Hash::make('fatimah12345'),
                'role' => 'member',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dina Fauziyah',
                'email' => 'dfauziyah18@gmail.com',
                'password' => Hash::make('dina12345'),
                'role' => 'member',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'M Faisal',
                'email' => 'muzhafr2@gmail.com',
                'password' => Hash::make('faisal12345'),
                'role' => 'member',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('users')->insert($data);
    }
}