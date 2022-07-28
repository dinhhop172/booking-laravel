<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{

    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $account_id = Account::all()->pluck('id')->toArray();
        $room_id = Room::all()->pluck('id')->toArray();

        return [
            'account_id' =>  Account::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'check_in' => now(),
            'check_out' => now(),
            'total_day' => $this->faker->randomDigit(),
            'total_price' => $this->faker->randomDigit(),
            'status' => $this->faker->randomDigit()
        ];
    }
}
