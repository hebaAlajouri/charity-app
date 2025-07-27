<?php

// app/Models/Job.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
         'title',
    'title_en',
    'location',
    'location_en',
    'description',
    'description_en',
    'type',
    'deadline',
    'is_active',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean',
    ];
}

