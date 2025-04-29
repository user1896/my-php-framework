<?php

namespace Core;

class App {
	protected static $container;

	public static function setContainer($container) { //static so we can call it without an instance.
		static::$container = $container;
	}

	public static function container() {
		return static::$container;
		// with the "$" it's the attribute "$container", and without the "$" but with "()" it's the method container()
	}

	public static function bind($key, $resolver) {
		static::container()->bind($key, $resolver);
	}
	
	public static function resolve($key) {
		return static::container()->resolve($key);
	}
}