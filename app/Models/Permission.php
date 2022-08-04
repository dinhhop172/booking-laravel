<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['route_name', 'title'];
    
    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }

    public function scopeWithNameBooking($query)
    {
        return $query->where('title', 'like', '%booking%');
    }

    public function scopeWithNameRoom($query)
    {
        return $query->where('title', 'like', '%room%');
    }
}
