<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYears extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_years',
        'current_years',
        'active',
    ];
}
