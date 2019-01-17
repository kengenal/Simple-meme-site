<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memes extends Model
{
    return $this->hasMany('App\User');
}
