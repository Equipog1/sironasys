<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class providers extends Model
{
    use HasFactory;
    //relacion uno a muchos inversa
    public function products(){
        return $this->belongsTo('App\models\providers');
    }
}
