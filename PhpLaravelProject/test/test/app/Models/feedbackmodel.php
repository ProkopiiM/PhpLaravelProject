<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbackmodel extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'status'];
}
