<?php

namespace Core\Middleware;

class Middleware {
	public const MAP = [
		'guest' => Guest::class, // if the key is 'guest' then it will return the class 'Guest'.
		'auth' => Auth::class,
	];

	public static function resolve($key) {
		// We called $key == $route['middleware'], and sometimes it is 'null', so we need to check before using it.
		if(!$key) {
			return;
		}

		// We get the correct middleware class from '$MAP'.
		$middleware = static::MAP[$key] ?? false; // if $key doesn't exist in $MAP then set $middleware to false.
		// We called $key == $route['middleware'] == ex: 'auth' then $Map['auth'] will return the class Auth.

		// If some other developer tries to use a middleware in the routes.php file that doesn't exist, ex:
		// $router->get('/notes', 'controllers/notes/index.php')->only('randomMidllewareGoo');
		// $middleware will be false, and we can't instantiate a false, we throw an exception:
		if(! $middleware) {
			throw new \Exception("No matching middleware were found for key '{$key}'.");
		}
		// This will trigger a "Fatal error" for the dev that used a non existing middleware, which is what we want.

		// We instantiate it.
		(new $middleware)->handle();
	}
}