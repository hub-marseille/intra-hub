<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = array('desc', 'name', 'author_id', 'status');

	public function user()
	{
		return ($this->belongsTo('App\User'));
	}
}