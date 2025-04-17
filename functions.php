<?php

function mydebug($var){
	echo "<pre>";
	var_dump($var);
	echo "</pre>";

	die();
}
// Rewite the logic that checks for user authentication
function authorize($condition, $status = Response::FORBIDDEN) {
	if(!$condition){
		abort($status);
	}
}