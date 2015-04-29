<?php namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;

class RedirectIfNotAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	protected $auth;

	public function __construct(Guard $auth)	{

		$this->auth = $auth;

	}



	public function handle($request, Closure $next)
	{	

		if (!$this->auth->check()){

			return new RedirectResponse(url('auth/login'));

		}
		if( !$request->user()->is('admin'))
		{
				//return redirect('article');
				return redirect('article');
		}
		return $next($request);
	}

}
