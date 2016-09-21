<?php

namespace App\Http\Middleware;

use Closure;

class EpitechHubAuth
{
	private $msg = 'Vous n\'avez pas le droit d\'accéder à cette page.';

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
		if ($intra == null or !unserialize($intra)->isHubMember())
			return (redirect('/')->with('dangerNotification', $this->msg));
		return ($next($request));
	}
}
