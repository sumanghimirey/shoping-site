<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    // protected $timestamp = false;

    protected $guarded = [];

    protected $fillable = ['username', 'email', 'password', 'name'];

}
