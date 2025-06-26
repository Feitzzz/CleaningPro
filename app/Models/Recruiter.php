<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
    ];

    public function jobs()
    {
        return $this->hasMany(BusinessJob::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 