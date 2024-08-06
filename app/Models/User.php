<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    use HasFactory;
    protected $table = 'users';
    public $fillable = [
        'username',
        'email',
        'password',
        'foto',
        'role'
    ];

    public function Blogs():HasMany{
        return $this->hasMany(Blog::class,'id_users','id');
    }

}
