<?php

namespace Core;

class Validator {
	// validating the size of a string:
	public static function string($value, $min = 1, $max = INF) {
		$value = trim($value);
		// the function "trim" strips whitespace from the beginning and end of a string.

		return strlen($value) >= $min && strlen($value) <= $max;
	}

	// Validating an email:
	public static function email($value) {
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}
}