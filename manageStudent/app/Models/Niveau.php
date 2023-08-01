<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
/* 
    protected $table ="niveaux"; */

    public function school_year(){
        return $this->belongsTo(SchoolYear::class);
    } 

    public function classe(){
        return $this->hasMany(Classe::class);
    }

    public function attribution(){
        return $this->belongsTo(Attribution::class);
    } 

}
