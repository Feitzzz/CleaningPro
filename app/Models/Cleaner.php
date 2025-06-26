<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cleaner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
    ];

    public function jobs()
    {
        return $this->belongsToMany(BusinessJob::class, 'job_cleaner')->withTimestamps();
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 