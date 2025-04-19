<?php

class Validator {
	// validating the size of a string:
	// Make the method static because it's not dependent on an internal state, this way we can call it without an instance.
	public static function string($value, $min = 1, $max = INF) {
		$value = trim($value);
		// the function "trim" strips whitespace (or other characters) from the beginning and end of a string
		// this way the user can't enter a string of whitespaces.

		return strlen($value) >= $min && strlen($value) <= $max;
	}

	// Validating an email:
	public static function email($value) {
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}
}