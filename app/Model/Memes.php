<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memes extends Model
{
	protected $fillable = [
        'id', 'user_id','title', 'type'
    ];

	public function user_id()
	{
    	return $this->hasMany('App\Models\User');
	}
}
