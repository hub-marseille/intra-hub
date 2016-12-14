<?php

namespace App\Http\Controllers;

use App\Classes\EpitechIntra;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	private $instance = 'intraInstance';

	public function __construct()
	{
		$this->middleware('epitech.guest')->only('getLogin', 'postLogin');
		$this->middleware('epitech.auth')->only('logout');
	}

	public function getLogin()
	{
		return (view('pages.login'));
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'login' => 'required',
			'password' => 'required|min:8'
		]);
		$remind = (isset($request->remind)) ? (true) : (false);

		$intra = new EpitechIntra;
		$intra->auth($request->login, $request->password, $remind);

		if (!$intra->isAuthenticated())
			return (view('pages.login')->withErrors(['Votre login ou votre mot de passe est eronné']));
		session([$this->instance => serialize($intra)]);

		if (!count(User::where('email', $intra->getLogin())->get()))
		{
			$user = new User;
			$user->email = $intra->getLogin();
			$user->password = bcrypt($request->password);
			$user->save();
		}

		return (redirect('/')->with('successNotification', 'Vous êtes maintenant connecté !'));
	}

	public function logout(Request $request)
	{
		$request->session()->forget($this->instance);
		return (redirect()->back()->with('successNotification', 'Vous vous êtes correctement déconnecté !'));
	}
}