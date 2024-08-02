<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
