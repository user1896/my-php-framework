<?php

function mydebug($var){
	echo "<pre>";
	var_dump($var);
	echo "</pre>";

	die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
	if(!$condition){
		abort($status);
	}
}