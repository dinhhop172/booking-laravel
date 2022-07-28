<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\RequestPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestPaymentFactory extends Factory
{

    protected $model = RequestPayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $staff_id = Account::where('roles', 'staff')->get()->pluck('id')->toArray();

        return [
            'staff_id' => $this->faker->randomElement($staff_id),
            'money' => $this->faker->randomDigit(),
            'status' => $this->faker->randomDigit(),
            'request_day' => now(),
            'payment_day' => now()
        ];
    }
}
