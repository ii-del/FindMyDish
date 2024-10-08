<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Ingredient extends Model
{
    use HasFactory;
    
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    
    protected $fillable = [
        'recipe_id',
        'name',
        'amount',
        'unit',
    ];
}
