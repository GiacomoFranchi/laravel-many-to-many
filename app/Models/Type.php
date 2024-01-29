<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    public function setTpologiaAttribute($value){
        $this->attributes['tipologia'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
