<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribution extends Model
{
    use HasFactory;

    public function eleve(){
        return $this->belongsTo(Eleve::class);
    }

    public function classe(){
        return $this->belongsTo(Classe::class);
    }

}
