<?php

namespace App\Http\Middleware;

use Closure;

class EpitechAuth
{
	private $msg = 'Vous devez être connecté pour accéder à cette page.';

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$intra = session('intraInstance');
		if ($intra == null or !unserialize($intra)->isAuthenticated())
			return (redirect('/')->with('dangerNotification', $this->msg));
		return ($next($request));
	}
}
