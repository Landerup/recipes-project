<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'cooking_time',
        'pic'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function instruction() {
        return $this->hasMany(Instruction::class);
    }

    public function ingredient() {
        return $this->belongsToMany(Ingredient::class)->withTimestamps();
    }

    public function category() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
