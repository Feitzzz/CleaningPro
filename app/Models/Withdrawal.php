<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'cleaner_id',
        'amount',
        'method',
        'details',
        'status',
    ];

    protected $casts = [
        'details' => 'array',
    ];

    public function cleaner()
    {
        return $this->belongsTo(Cleaner::class);
    }
} 