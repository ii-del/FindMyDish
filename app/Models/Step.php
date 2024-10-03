<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Step extends Model
{
    use HasFactory;
    
    public function recipes()
    {
        return $this->belongsTo(Recipe::class);
    }
    
    protected $fillable = [
        'recipe_id',
        'body',
        'image',
    ];
}
