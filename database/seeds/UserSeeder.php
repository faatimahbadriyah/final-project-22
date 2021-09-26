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
                'name' => 'Customer 1',
                'email' => 'faatimahbadriyah@gmail.com',
                'password' => Hash::make('customer123'),
                'role' => 'member',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('users')->insert($data);
    }
}