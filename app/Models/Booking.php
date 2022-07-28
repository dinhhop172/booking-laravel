<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = ['account_id', 'room_id', 'check_in', 'check_out', 'total_day', 'total_price', 'status'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    
}
