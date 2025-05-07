<?php

namespace Core;

use \Core\Middleware\Guest;
use \Core\Middleware\Auth;
use \Core\Middleware\Middleware;

class Router {
	protected $routes = [];

	public function add($method, $uri, $controller) {
		$this->routes[] = [
			'uri' => $uri,
			'controller' => $controller,
			'method' => $method,
			'middleware' => null
		];

		return $this;
	}
	
	public function get($uri, $controller) {
		return $this->add('GET', $uri, $controller);
	}

	public function post($uri, $controller) {
		return $this->add('POST', $uri, $controller);
	}

	public function delete($uri, $controller) {
		return $this->add('DELETE', $uri, $controller);
	}

	public function patch($uri, $controller) {
		return $this->add('PATCH', $uri, $controller);
	}

	public function put($uri, $controller) {
		return $this->add('PUT', $uri, $controller);
	}

	public function only($key) {
		// in the routes.php file when we set our routes in the $routes variable, when we call the method only()
		// it means the last route added is the route that the method only() was called into.
		$this->routes[array_key_last($this->routes)]['middleware'] = $key;
		
		// Now we need to apply this middleware in the route() method.
	}

	public function route($uri, $method) {
		foreach($this->routes as $route) {
			// the PHP function "strtoupper()" just turns all caracters to uppercase.
			if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
				// sometimes a uri like 'note' can handle a simple GET request to show a note, and a DELETE request to
				// delete a note, so we need to know both the uri and the method.

				// applay the middleware
				Middleware::resolve($route['middleware']);

				return require base_path($route['controller']);
			}
		}

		// If we reach this line it means we haven't found a matching uri:
		$this->abort();
	}

	// we don't want this method to be called, unless we call it when we route, so we make it protected.
	protected function abort($code = 404) {
		http_response_code($code);
	
		// we should have a safety mechanism here to check if the page "views/{$code}.php" exists
		require base_path("views/{$code}.php");
	
		die();
	}
}