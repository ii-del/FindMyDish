<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ingredient;
use App\Models\Step;

class Recipe extends Model
{
    use HasFactory;
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
    public function steps()
    {
        return $this->hasMany(Step::class);
    }
    
    protected $fillable = [
        'user_id',
        'name',
        'image',
        'headcount',
    ];
}
