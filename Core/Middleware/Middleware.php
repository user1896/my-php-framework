<?php

namespace Core\Middleware;

class Middleware {
	public const MAP = [
		'guest' => Guest::class, // if the key is 'guest' then it will return the class 'Guest'.
		'auth' => Auth::class,
	];
}