<?php

// base class for all controllers
abstract class base_cntl
{
	public function __construct() {
	}

	abstract public function call($args);
}


?>
