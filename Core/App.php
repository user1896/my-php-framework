<?php

namespace Core;

class App {
	protected static $container;

	public static function setContainer($container) { //static so we can call it without an instance.
		static::$container = $container;
	}

	public static function container() {
		return static::$container;
	}
	// I have access to App::container() From anywhere in the project.
}