<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i < 10; $i++){
            DB::table('rooms')->insert([
                [
                    'name' => 'Room '.$i,
                    'price' => '1'.$i.'00',
                    'status' => '1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
