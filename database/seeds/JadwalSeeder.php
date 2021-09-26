<?php

use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
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
                'status' => 'available',
                'jam' => '08:00-09:00',
                'harga' => 20000,
                'lapangan_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'available',
                'jam' => '08:00-09:00',
                'harga' => 15000,
                'lapangan_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'available',
                'jam' => '08:00-09:00',
                'harga' => 30000,
                'lapangan_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'available',
                'jam' => '08:00-09:00',
                'harga' => 60000,
                'lapangan_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'available',
                'jam' => '09:00-10:00',
                'harga' => 25000,
                'lapangan_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'available',
                'jam' => '09:00-10:00',
                'harga' => 15000,
                'lapangan_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('jadwal')->insert($data);
    }
}