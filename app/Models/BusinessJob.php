<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'recruiter_id',
        'title',
        'description',
        'location',
        'scheduled_at',
    ];

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function cleaners()
    {
        return $this->belongsToMany(Cleaner::class, 'job_cleaner')->withTimestamps();
    }
} 