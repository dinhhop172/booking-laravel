<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPayment extends Model
{
    use HasFactory;

    protected $table = 'request_payments';

    protected $fillable = ['staff_id', 'money', 'status', 'request_day', 'payment_day'];

    public function staffs()
    {
        return $this->belongsTo(Account::class, 'staff_id');
    }
}
