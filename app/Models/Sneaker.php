<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sneaker extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'gender',
        'brand',
        'color',
        'sizes',
        'release_date',
    ];
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

}