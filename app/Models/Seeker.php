<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seeker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    function scopeAvailable($query, $bool = 1)
    {
        return $query->where('available', $bool);
    }
}
