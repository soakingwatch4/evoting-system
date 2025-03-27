<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Voter extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'national_id',
        'password',
    ];
    protected $hidden=[
        'password',
        'remember_token',
    ];
}
