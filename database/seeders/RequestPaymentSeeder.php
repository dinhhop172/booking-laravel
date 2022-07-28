<?php

namespace Database\Seeders;

use App\Models\RequestPayment;
use Illuminate\Database\Seeder;

class RequestPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestPayment::factory()
            ->count(5)
            ->create();
    }
}
