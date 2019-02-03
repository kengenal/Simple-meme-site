<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memes extends Model
{
	protected $fillable = [
<<<<<<< HEAD
        'id', 'user_id','title', 'type', 'format'
=======
        'id', 'user_id','title', 'type', 'name', 'format', 'home'
>>>>>>> dev
    ];

	public function user_id()
	{
    	return $this->hasMany('App\Models\User');
	}
}
