<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */



	public function handle($request, Closure $next)
	{	
		if( !$request->user()->is('admin'))
		{
			//return redirect('article');
			return redirect('article');
		}

		return $next($request);
	}

}
