<?php

namespace Core;

class Session {
	public static function has($key) {
		return (bool) Session::get($key);
		// if get() return a value other than 0 then "(bool) value" return "true"
		// if get() return "null" then "(bool) null" return "false"
	}

	public static function put($key, $value) {
		$_SESSION[$key] = $value;
	}

	public static function get($key, $default = null) {
		return $_SESSION[$key] ?? $default;
	}

	public static function flush($key, $value) {
		// The "flush()" method puts something into the session, but marks it as "_flush".
		// so things add to the session with flush() should only live for a single request.
		$_SESSION['_flush'][$key] = $value;
	}

	public static function unflush() {
		unset($_SESSION['_flush']);
	}
}