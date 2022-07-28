<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'username' => 'Admin',
                'password' => Hash::make('123123'),
                'email' => 'dinhhop172@gmail.com',
                'phone' => rand(1111111111,9999999999),
                'gender' => 'male',
                'address' => 'Hue city',
                'roles' => 'admin',
                'verification_code' => '123123',
                'email_verified_at' => now(),
                'staff_id' => '',
                'percent' => '',
                'money' => '',
                'status' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Staff',
                'password' => Hash::make('123123'),
                'email' => 'nhatthang1702@gmail.com',
                'phone' => rand(1111111111,9999999999),
                'gender' => 'male',
                'address' => 'Hue city',
                'roles' => 'staff',
                'verification_code' => '123123',
                'email_verified_at' => now(),
                'staff_id' => '',
                'percent' => '',
                'money' => '',
                'status' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'User',
                'password' => Hash::make('123123'),
                'email' => 'nhatthang1720@gmail.com',
                'phone' => rand(1111111111,9999999999),
                'gender' => 'male',
                'address' => 'Hue city',
                'roles' => 'user',
                'verification_code' => '123123',
                'email_verified_at' => now(),
                'staff_id' => '',
                'percent' => '',
                'money' => '',
                'status' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}
