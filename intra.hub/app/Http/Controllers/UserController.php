<?php

namespace App\Http\Controllers;

use App\User;
use Curl\Curl;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('epitech.auth')->only('user');
	}

	public function user($login)
	{
		$user = User::where('login', '=', $login)->get()->last();
		dd($user);
		return ($user);
	}
}
