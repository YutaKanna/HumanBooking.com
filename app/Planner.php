<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Planner extends Authenticatable
{
    use Notifiable;

    protected $table = 'planners';

    protected $fillable = ['name','email','password'];

   protected $hidden = ['password', ];
}
