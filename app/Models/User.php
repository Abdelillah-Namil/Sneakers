<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class User extends Model implements Authenticatable
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'bio',
        'is_admin', // Add the is_admin field to the fillable array
    ];
    
    protected $attributes = [
        'profile_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJdj_g-QIwNa91IKr4jYQqzK-tRMwbOVNytJPoKRg1MS7xzyXXt6vRuPxtljcJp0LN6fU&usqp=CAU',
        'bio' => 'I am a SFL user',
        'is_admin' => false, // Set the default value for the is_admin field
    ];
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    public function isAdmin()
    {
        return $this->is_admin;
    }
}
