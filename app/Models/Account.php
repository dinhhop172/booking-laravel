<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'accounts';

    protected $fillable = ['username', 'password', 'email', 'phone', 'gender', 'address', 'address', 'roles', 'verification_code', 'email_verified_at', 'staff_id', 'percent', 'money', 'status'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function request_payments()
    {
        return $this->hasMany(RequestPayment::class, 'staff_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}