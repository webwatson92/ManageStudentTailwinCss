<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_year',
        'current_year',
        'active',
    ];

  /*   protected $table ="school_years"; */

    public function niveau(){
        return $this->hasMany(Niveau::class);
    } 
}
