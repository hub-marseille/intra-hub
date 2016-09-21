<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = array('content', 'name', 'author_id');

	public function author()
	{
		return ($this->belongsTo('App\User'));
	}

	public function comments()
	{
		return ($this->hasMany('App\Comment')->orderBy('updated_at', 'desc'));
	}
}
