<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisScolarite extends Model
{
    use HasFactory;

    public function niveau(){
        return $this->belongsTo(Niveau::class, "niveau_id");
    }

    public function schoolyear(){
        return $this->belongsTo(SchoolYear::class, "school_year_id");
    }
}
