<?php

namespace Core;

class Container {
	protected $bindings = [];

	public function bind($key, $resolver) { // to add something to the container.
		$this->bindings[$key] = $resolver;
	}

	public function resolve($key) { // to grab something from the container.
		// If the key doesn't exist then throw an exception:
		if(! array_key_exists($key, $this->bindings)) {
			throw new \Exception("No matching binding found for {$key}");
		}

		// if we reach this line it means the key exists.
		// now we save the resolver function associated with "$key".
		$resolver = $this->bindings[$key];

		return call_user_func($resolver); // this just calls the function and returns the result.
	}
}