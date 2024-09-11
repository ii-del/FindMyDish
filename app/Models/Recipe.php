<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ingredient()
    {
        return $this->hasMany(Ingredient::class);
    }
    public function step()
    {
        return $this->hasMany(Step::class);
    }
}
