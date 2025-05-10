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
		// First we look if the key is an index to a value that we want to flush.
		// otherwise fallback to looking at the key in the top level of $_SESSION..
		// otherwise default value.
		return $_SESSION['_flush'][$key] ?? $_SESSION[$key] ?? $default;
	}

	public static function flush($key, $value) {
		// The "flush()" method puts something into the session, but marks it as "_flush".
		// so things add to the session with flush() should only live for a single request.
		$_SESSION['_flush'][$key] = $value;
	}

	public static function unflush() {
		unset($_SESSION['_flush']);
	}

	public static function destroy() {
		// First clear out the super global $_SESSION
		$_SESSION = [];
	
		// Destroy all data registered to a session in the server
		session_destroy();
	
		// clear out the cookie in the browser
		// for that we have to update the cookie and set its corresponding expiration
	
		// First we grab the current session cookie information:
		$params = session_get_cookie_params();
	
		setcookie('PHPSESSID', 'my sssss', time() + 3600, $params['path'], $params['domain']);
		// - First parameter: When we logged in and created a session, by default the name of the session is: 'PHPSESSID'
		// is all browsers So here when we create a session with the same name, we're overriding the one that was created.
		// - Second parameter: We give our cookie an empty value: ''.
		// - Third parameter: we set its experation date a time in the past (time()-3600) so it expires immediately.
	}
}