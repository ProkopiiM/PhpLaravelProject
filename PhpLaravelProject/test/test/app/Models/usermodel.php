<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class usermodel extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'password', 'status', 'dateredact'];
    protected $casts = [
        "password" => "hashed"
    ];
}
