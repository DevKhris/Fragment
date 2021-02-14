<?php

declare(strict_types=1);

namespace RubyNight\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username'
    ];
    
}