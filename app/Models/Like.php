<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sneaker;


class Like extends Model
{
    protected $fillable = [
        'user_id',
        'sneaker_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sneaker()
    {
        return $this->belongsTo(Sneaker::class);
    }
}
