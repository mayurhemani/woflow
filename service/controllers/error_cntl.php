<?php

class error_cntl
{
	public function __construct() {}

	public function call($args) {
		print_r($args);
	}

	public function handleException($err) {
		print_r($err);
	}
}

?>
