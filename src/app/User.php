<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];

	public function projects()
	{
		return ($this->hasMany('App\Project'));
	}

	public function articles()
	{
		return ($this->hasMany('App\Article'));
	}

	public function comments()
	{
		return ($this->hasMany('App\Comment'));
	}

	public function role()
	{
		return ($this->belongsTo('App\Role'));
	}
}
