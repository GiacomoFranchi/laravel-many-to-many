<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tecnology extends Model
{
    use HasFactory;

    public function setTecnologyAttribute($value){
        $this->attributes['tecnologia'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
