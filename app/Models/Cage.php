<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    use HasFactory;
    protected $fillable = ['nameCage', 'descriptionCage'];

    public function animals()
    {
        return $this->hasMany(Animal::class, 'cage_id', 'id');
    }
}
